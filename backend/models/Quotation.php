<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "quotation".
 *
 * @property integer $id
 * @property string $title
 * @property double $price
 * @property double $vat
 * @property integer $date_created
 * @property integer $date_edited
 */
class Quotation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quotation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'price', 'vat', 'date_created', 'date_edited'], 'required'],
            [['price', 'vat'], 'number'],
            [['date_created', 'date_edited'], 'integer'],
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
            'price' => 'Price',
            'vat' => 'Vat',
            'date_created' => 'Date Created',
            'date_edited' => 'Date Edited',
        ];
    }
}
