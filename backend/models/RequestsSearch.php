<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Requests;

/**
 * RequestsSearch represents the model behind the search form about `backend\models\Requests`.
 */
class RequestsSearch extends Requests
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'quotation_id', 'service_id', 'technician_id', 'status', 'type', 'date_created', 'date_edited'], 'integer'],
            [['location', 'description', 'phone'], 'safe'],
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
        $query = Requests::find();

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
            'quotation_id' => $this->quotation_id,
            'service_id' => $this->service_id,
            'technician_id' => $this->technician_id,
            'status' => $this->status,
            'type' => $this->type,
            'date_created' => $this->date_created,
            'date_edited' => $this->date_edited,
        ]);

        $query->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'phone', $this->phone]);

        return $dataProvider;
    }
}
