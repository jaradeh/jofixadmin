<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ServiceAnswers;

/**
 * ServiceAnswersSearch represents the model behind the search form about `backend\models\ServiceAnswers`.
 */
class ServiceAnswersSearch extends ServiceAnswers
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'request_id', 'answer_id', 'date_created', 'date_edited'], 'integer'],
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
        $query = ServiceAnswers::find();

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
            'request_id' => $this->request_id,
            'answer_id' => $this->answer_id,
            'date_created' => $this->date_created,
            'date_edited' => $this->date_edited,
        ]);

        return $dataProvider;
    }
}
