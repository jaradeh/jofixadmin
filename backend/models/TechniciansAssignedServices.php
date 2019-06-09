<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "technicians_assigned_services".
 *
 * @property integer $id
 * @property string $tech_id
 * @property string $service_id
 */
class TechniciansAssignedServices extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'technicians_assigned_services';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tech_id', 'service_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tech_id' => 'technician',
            'service_id' => 'Service',
        ];
    }
}
