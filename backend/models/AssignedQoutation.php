<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "assigned_qoutation".
 *
 * @property integer $id
 * @property integer $qoutation_id
 * @property string $description
 * @property integer $quantity
 * @property string $unit
 * @property double $unit_price
 * @property double $total
 */
class AssignedQoutation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'assigned_qoutation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['qoutation_id', 'description', 'quantity', 'unit_price', 'total'], 'required'],
            [['qoutation_id', 'quantity'], 'integer'],
            [['unit_price', 'total'], 'number'],
            [['description', 'unit'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'qoutation_id' => 'Qoutation ID',
            'description' => 'Description',
            'quantity' => 'Quantity',
            'unit' => 'Unit',
            'unit_price' => 'Unit Price',
            'total' => 'Total',
        ];
    }
}
