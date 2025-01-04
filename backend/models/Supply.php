<?php

namespace backend\models;

use backend\components\Steppy;
use Yii;

/**
 * This is the model class for table "supply".
 *
 * @property int $id
 * @property int $product_id
 * @property float $qty
 * @property string $created_at
 * @property string $updated_at
 * @property float $price
 *
 * @property Product $product
 */
class Supply extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'supply';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'qty', 'price'], 'required'],
            [['product_id'], 'integer'],
            [['qty', 'price'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'qty' => Yii::t('app', 'Qty'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'price' => Yii::t('app', 'Price'),
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {

        $steppy = new Steppy();
        $steppy->query = Stock::find()->where([
            'product_id' => $this->product_id,
            'price' => $this->price
        ]);

        $steppy->column = 'qty';

        if ($insert) {
            $steppy->quantity = $this->qty;
            $steppy->plus();
        }

        return parent::afterSave($insert, $changedAttributes);
    }

    public function beforeDelete()
    {

        $steppy = new Steppy();
        $steppy->query = Stock::find()->where([
            'product_id' => $this->product_id,
            'price' => $this->price
        ]);

        $steppy->column = 'qty';

        $steppy->quantity = $this->qty;
        $steppy->minus();

        return parent::beforeDelete();
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }
}
