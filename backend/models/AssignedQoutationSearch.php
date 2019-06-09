<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AssignedQoutation;

/**
 * AssignedQoutationSearch represents the model behind the search form about `backend\models\AssignedQoutation`.
 */
class AssignedQoutationSearch extends AssignedQoutation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'qoutation_id', 'quantity'], 'integer'],
            [['description', 'unit'], 'safe'],
            [['unit_price', 'total'], 'number'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = AssignedQoutation::find();

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
            'qoutation_id' => $this->qoutation_id,
            'quantity' => $this->quantity,
            'unit_price' => $this->unit_price,
            'total' => $this->total,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'unit', $this->unit]);

        return $dataProvider;
    }
}
