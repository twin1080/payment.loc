<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "custom".
 *
 * @property integer $ID
 * @property string $Time
 * @property string $Sum
 *
 * @property Payment[] $payments
 */
class Custom extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'custom';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Time'], 'safe'],
            [['Sum'], 'required'],
            [['Sum'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'Order number',
            'Time' => 'Creation time',
            'Sum' => 'Order price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payment::className(), ['CustomID' => 'ID']);
    }
}
