<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "services".
 *
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property integer $lang_id
 * @property integer $date_created
 * @property integer $date_edited
 */
class Services extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'services';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['lang_id', 'date_created', 'date_edited'], 'integer'],
            [['name', 'image'], 'string', 'max' => 255],
            [['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png ,jpg ,jpeg', 'maxFiles' => 1],
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
            'image' => 'Image',
            'lang_id' => 'Lang ID',
            'date_created' => 'Date Created',
            'date_edited' => 'Date Edited',
        ];
    }
}
