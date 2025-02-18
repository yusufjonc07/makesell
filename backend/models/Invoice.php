<?php

namespace backend\models;


use backend\components\Steppy;
use chillerlan\QRCode\Data\QRMatrix;
use chillerlan\QRCode\Output\QRGdImageWEBP;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

use Yii;
use yii\web\BadRequestHttpException;

/**
 * This is the model class for table "invoice".
 *
 * @property int $id
 * @property int $customer_id
 * @property float|null $total_value
 * @property string $created_at
 * @property string $updated_at
 * @property int $number
 * @property int $status
 * @property string $address
 * @property string $comment
 *
 * @property Customer $customer
 * @property Order[] $orders
 */
class Invoice extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'invoice';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id', 'number', 'address', 'comment'], 'required'],
            [['customer_id', 'number', 'status'], 'integer'],
            [['total_value'], 'number'],
            ['status', 'default', 'value' => 0],
            [['created_at', 'updated_at'], 'safe'],
            [['address', 'comment'], 'string', 'max' => 255],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::class, 'targetAttribute' => ['customer_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'customer_id' => Yii::t('app', 'Customer ID'),
            'total_value' => Yii::t('app', 'Total Value'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'number' => Yii::t('app', 'Number'),
            'status' => Yii::t('app', 'Status'),
            'address' => Yii::t('app', 'Address'),
            'comment' => Yii::t('app', 'Comment'),
        ];
    }

    public function getStatusColor()
    {
        return $this->status == 0 ? 'danger' : 'success';
    }

    public function getStatusLabel()
    {
        return $this->status == 0 ? 'Pending' : 'Confirmed';
    }
    

    public function generateNumber()
    {

        $this->number = random_int(123456, 999999);

        $invoice = Invoice::findOne(['number' => $this->number]);

        if ($invoice) {
            $this->generateNumber();
        }

        return $this;
    }

    public function getQrCode()
    {
        $options = new QROptions();

        // $outputInterface can be one of the classes listed in `QROutputInterface::MODES`
        $options->outputInterface = QRGdImageWEBP::class;
        $options->quality = 90;
        // the size of one qr module in pixels
        $options->scale = 20;
        $options->bgColor = [200, 150, 200];
        $options->imageTransparent = true;
        // the color that will be set transparent
        $options->transparencyColor = [200, 150, 200];
        $options->drawCircularModules = true;
        $options->drawLightModules = true;
        $options->circleRadius = 0.4;
        $options->keepAsSquare = [
            QRMatrix::M_FINDER_DARK,
            QRMatrix::M_FINDER_DOT,
            QRMatrix::M_ALIGNMENT_DARK,
        ];
        $options->moduleValues = [
            QRMatrix::M_FINDER_DARK => [0, 63, 255], // dark (true)
            QRMatrix::M_FINDER_DOT => [0, 63, 255], // finder dot, dark (true)
            QRMatrix::M_FINDER => [233, 233, 233], // light (false)
            QRMatrix::M_ALIGNMENT_DARK => [255, 0, 255],
            QRMatrix::M_ALIGNMENT => [233, 233, 233],
            QRMatrix::M_DATA_DARK => [0, 0, 0],
            QRMatrix::M_DATA => [233, 233, 233],
        ];

        return (new QRCode($options))->render(Yii::$app->request->absoluteUrl);
    }



    public function checkStock($orders)
    {

        foreach ($orders as $order) {
            $steppy = new Steppy();
            $steppy->query = $order->product->getStocks();
            $steppy->column = 'qty';
            $steppy->quantity = $order->qty;
            if ($steppy->minus(null, false) !== true) {
                throw new BadRequestHttpException(Yii::t('app', 'Product is not enoung on the stock!'));
            }
        }

        return true;

    }

    public function minusStock($orders)
    {

        foreach ($orders as $order) {
            $steppy = new Steppy();
            $steppy->query = $order->product->getStocks();
            $steppy->column = 'qty';
            $steppy->quantity = $order->qty;

            if ($steppy->minus()) {
                $order->status = 1;
                $order->invoice_id = $this->id;
                $order->save();
            }
        }

        return $this;

    }

    public function minusBalance(){
        $this->customer->balance -= $this->total_value;
        $this->customer->save();
        return $this;
    }

    public function plusBalance(){
        $this->customer->balance += $this->total_value;
        $this->customer->save();
        return $this;
    }

    public function beforeDelete()
    {
        foreach ($this->orders as $order) {
            $steppy = new Steppy();
            $steppy->query = Stock::find()->where([
                'product_id' => $order->product_id,
                'price' => $order->product->price
            ]);
            $steppy->column = 'qty';
            $steppy->quantity = $order->qty;
            $steppy->plus();
            $order->delete();
        }
        return parent::beforeDelete();
    }


    /**
     * Confirmation for [[Invoice]].
     *
     * @return bool
     */

    public function confirm()
    {
        $this->status = 1;
        return $this->save();
    }

    /**
     * Gets query for [[Customer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::class, ['id' => 'customer_id']);
    }
    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::class, ['invoice_id' => 'id']);
    }
}
