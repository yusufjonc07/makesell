<?php

namespace backend\models;

use Yii;

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
            [['customer_id', 'number', 'status', 'address', 'comment'], 'required'],
            [['customer_id', 'number', 'status'], 'integer'],
            [['total_value'], 'number'],
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

    /**
     * Gets query for [[Customer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::class, ['id' => 'customer_id']);
    }
}
