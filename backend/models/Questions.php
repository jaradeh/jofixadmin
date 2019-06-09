<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "questions".
 *
 * @property integer $id
 * @property string $title
 * @property integer $service_id
 * @property integer $date_created
 * @property integer $date_edited
 */
class Questions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'questions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'service_id', 'date_created', 'date_edited'], 'required'],
            [['service_id', 'date_created', 'date_edited'], 'integer'],
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
            'title' => 'Title',
            'service_id' => 'Service ID',
            'date_created' => 'Date Created',
            'date_edited' => 'Date Edited',
        ];
    }
}
