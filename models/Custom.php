<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "custom".
 *
 * @property integer $ID
 * @property string $Time
 * @property string $Sum
 * @property integer $UserID
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
            [['UserID'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['UserID' => 'id']],
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
            'Sum' => 'Order price($)',
            'UserID' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payment::className(), ['CustomID' => 'ID']);
    }
    
        /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'UserID']);
    }
    
    public function fullyPaid()
    {
        $sum = 0;
        foreach($this->getPayments()->all() as $pay)
        {
            $sum = $sum + $pay->getSumInUSD();
        }
            
        return    $done = $this->Sum <= $sum;
    }
    
}
