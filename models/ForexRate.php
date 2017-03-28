<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "forexrate".
 *
 * @property integer $ID
 * @property string $Name
 * @property string $USD
 */
class ForexRate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'forexrate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Name', 'USD'], 'required'],
            [['USD'], 'number'],
            [['Name'], 'string', 'max' => 3],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Name' => 'Name',
            'USD' => 'Usd',
        ];
    }
}
