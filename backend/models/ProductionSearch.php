<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Production;

/**
 * ProductionSearch represents the model behind the search form of `backend\models\Production`.
 */
class ProductionSearch extends Production
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'recipe_id', 'product_id', 'user_id'], 'integer'],
            [['qty', 'price'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
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
        $query = Production::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
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
            'recipe_id' => $this->recipe_id,
            'product_id' => $this->product_id,
            'user_id' => $this->user_id,
            'qty' => $this->qty,
            'price' => $this->price,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        return $dataProvider;
    }
}
