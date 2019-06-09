<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "service_answers".
 *
 * @property integer $id
 * @property integer $request_id
 * @property integer $answer_id
 * @property integer $date_created
 * @property integer $date_edited
 */
class ServiceAnswers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'service_answers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['request_id', 'answer_id', 'date_created', 'date_edited'], 'required'],
            [['request_id', 'answer_id', 'date_created', 'date_edited'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'request_id' => 'Request ID',
            'answer_id' => 'Answer ID',
            'date_created' => 'Date Created',
            'date_edited' => 'Date Edited',
        ];
    }
}
