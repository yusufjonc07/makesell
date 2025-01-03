<?php

namespace backend\models;

use backend\components\Steppy;
use common\models\User;
use Yii;

/**
 * This is the model class for table "production".
 *
 * @property int $id
 * @property int $recipe_id
 * @property int $product_id
 * @property int $user_id
 * @property float $qty
 * @property float $price
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Product $product
 * @property Recipe $recipe
 * @property User $user
 */
class Production extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'production';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['recipe_id', 'product_id', 'qty', 'price'], 'required'],
            [['recipe_id', 'product_id', 'user_id'], 'integer'],
            [['qty', 'price'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['product_id' => 'id']],
            [['recipe_id'], 'exist', 'skipOnError' => true, 'targetClass' => Recipe::class, 'targetAttribute' => ['recipe_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'recipe_id' => Yii::t('app', 'Recipe'),
            'product_id' => Yii::t('app', 'Product'),
            'user_id' => Yii::t('app', 'User'),
            'qty' => Yii::t('app', 'Qty'),
            'price' => Yii::t('app', 'Price'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {

        if ($insert) {
            foreach ($this->recipe->ingredients as $ingredient) {
                $steppy = new Steppy();
                $steppy->query = $ingredient->product->getStocks();
                $steppy->column = 'qty';
                $steppy->quantity = $ingredient->qty * $this->qty;
                $steppy->minus();
            }
        }

        return parent::afterSave($insert, $changedAttributes);

    }

    public function beforeSave($insert)
    {

        if ($insert) {
            foreach ($this->recipe->ingredients as $ingredient) {
                $steppy = new Steppy();
                $steppy->query = $ingredient->product->getStocks();
                $steppy->column = 'qty';
                $steppy->quantity = $ingredient->qty * $this->qty;
                
                if(!$steppy->checkStock()){
                    return false;
                }
            }
        }

        return parent::beforeSave($insert);

    }

    public function beforeDelete()
    {
        foreach ($this->recipe->ingredients as $ingredient) {
            $steppy = new Steppy();
            $steppy->query = Stock::find()->where([
                'product_id' => $ingredient->product_id,
                'price' => $ingredient->product->price
            ]);
            $steppy->column = 'qty';
            $steppy->quantity = $ingredient->qty * $this->qty;
            $steppy->plus();
        }
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

    /**
     * Gets query for [[Recipe]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecipe()
    {
        return $this->hasOne(Recipe::class, ['id' => 'recipe_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
