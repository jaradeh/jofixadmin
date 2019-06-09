<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "requests".
 *
 * @property integer $id
 * @property integer $quotation_id
 * @property integer $service_id
 * @property integer $technician_id
 * @property integer $status
 * @property integer $type
 * @property string $location
 * @property string $description
 * @property string $phone
 * @property integer $date_created
 * @property integer $date_edited
 */
class Requests extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'requests';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['quotation_id', 'service_id', 'technician_id', 'status', 'type', 'date_created', 'date_edited'], 'integer'],
            [['service_id', 'technician_id', 'location', 'description', 'phone', 'date_created', 'date_edited'], 'required'],
            [['description'], 'string'],
            [['location', 'phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'quotation_id' => 'Quotation ID',
            'service_id' => 'Service ID',
            'technician_id' => 'Technician ID',
            'status' => 'Status',
            'type' => 'Type',
            'location' => 'Location',
            'description' => 'Description',
            'phone' => 'Phone',
            'date_created' => 'Date Created',
            'date_edited' => 'Date Edited',
        ];
    }
}
