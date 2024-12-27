<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property float $price
 * @property string|null $description
 * @property string $created_at
 * @property string $updated_at
 * @property float $remind_value
 * @property string $measurement
 *
 * @property Ingredient[] $ingredients
 * @property Order[] $orders
 * @property Production[] $productions
 * @property Recipe[] $recipes
 * @property Stock[] $stocks
 * @property Supply[] $supplies
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price', 'remind_value', 'measurement'], 'required'],
            [['price', 'remind_value'], 'number'],
            [['description'], 'string'],
            [['image'], 'file', 'extensions' => 'png,jpg,jpeg,webp', 'checkExtensionByMimeType'=>false, 'skipOnEmpty' => false],
    [["file"], "headerCheck"],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'measurement'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'price' => Yii::t('app', 'Price'),
            'description' => Yii::t('app', 'Description'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'remind_value' => Yii::t('app', 'Remind Value'),
            'measurement' => Yii::t('app', 'Measurement'),
        ];
    }

    /**
     * Gets query for [[Ingredients]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIngredients()
    {
        return $this->hasMany(Ingredient::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Productions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductions()
    {
        return $this->hasMany(Production::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Recipes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecipes()
    {
        return $this->hasMany(Recipe::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Stocks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStocks()
    {
        return $this->hasMany(Stock::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Supplies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSupplies()
    {
        return $this->hasMany(Supply::class, ['product_id' => 'id']);
    }
}
