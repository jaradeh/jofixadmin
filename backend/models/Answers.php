<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "answers".
 *
 * @property integer $id
 * @property integer $question_id
 * @property string $title
 * @property integer $date_created
 * @property integer $date_edited
 */
class Answers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'answers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question_id', 'title', 'date_created', 'date_edited'], 'required'],
            [['question_id', 'date_created', 'date_edited'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'question_id' => 'Question ID',
            'title' => 'Title',
            'date_created' => 'Date Created',
            'date_edited' => 'Date Edited',
        ];
    }
}
