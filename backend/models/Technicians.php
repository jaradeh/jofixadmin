<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "technicians".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property integer $phone
 * @property string $image
 * @property integer $status
 * @property integer $date_created
 * @property integer $date_edited
 * @property string $experience
 * @property string $profession
 * @property string $description
 */
class Technicians extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'technicians';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'status', 'date_created', 'date_edited', 'experience', 'profession', 'description'], 'required'],
            [['phone', 'status', 'date_created', 'date_edited'], 'integer'],
            [['name', 'email', 'image', 'experience', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'image' => 'Image',
            'status' => 'Status',
            'date_created' => 'Date Created',
            'date_edited' => 'Date Edited',
            'experience' => 'Experience',
            'profession' => 'Profession',
            'description' => 'Description',
        ];
    }
}
