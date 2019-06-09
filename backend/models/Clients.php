<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "clients".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property integer $phone
 * @property string $token
 * @property integer $token_valid
 * @property integer $date_created
 */
class Clients extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clients';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'token', 'token_valid', 'date_created'], 'required'],
            [['phone', 'token_valid', 'date_created'], 'integer'],
            [['name', 'email', 'token'], 'string', 'max' => 255],
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
            'token' => 'Token',
            'token_valid' => 'Token Valid',
            'date_created' => 'Date Created',
        ];
    }
}
