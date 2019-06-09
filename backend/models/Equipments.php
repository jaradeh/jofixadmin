<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "equipments".
 *
 * @property integer $id
 * @property string $name
 * @property integer $status
 * @property integer $date_created
 * @property integer $date_edited
 */
class Equipments extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'equipments';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'status'], 'required'],
            [['status', 'date_created', 'date_edited'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'status' => 'Status',
            'date_created' => 'Date Created',
            'date_edited' => 'Date Edited',
        ];
    }

}
