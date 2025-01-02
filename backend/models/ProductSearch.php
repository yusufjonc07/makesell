<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Product;

/**
 * ProductSearch represents the model behind the search form of `backend\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'isTradable'], 'integer'],
            [['name', 'description', 'created_at', 'updated_at', 'measurement', 'image'], 'safe'],
            [['price', 'remind_value'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Product::find()
        ->select([
            'product.id',
            'product.name',
            'product.image',
            'product.price',
            'product.measurement',
            'SUM(stock.qty) as remind_value',
        ])
        ->joinWith('stocks')
        ->with('stocks')
        ->where(['>', 'stock.qty', 0])->groupBy('product.id');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=>[
                'pageSize'=>10
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'price' => $this->price,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'remind_value' => $this->remind_value,
            'isTradable' => $this->isTradable,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'measurement', $this->measurement])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
