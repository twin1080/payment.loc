<?php

namespace app\models;

use Yii;
use app\components;
use yii\behaviors\AttributeTypecastBehavior;
use \DateTime;
/**
 * This is the model class for table "payment".
 *
 * @property integer $ID
 * @property string $CardNumder
 * @property string $CardHolder
 * @property string $ExpirationDate
 * @property string $cvv
 * @property integer $CustomID
 * @property string $Sum
 * @property string $Time
 * @property integer $done
 * @property integer $CurrencyID
 *
 * @property Forexrate $currency
 * @property Custom $custom
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payment';
    }

    public function behaviors()
    {
         return [
                    'typecast' => [
                        'class' => AttributeTypecastBehavior::className(),
                        'attributeTypes' => [
                            'CardNumder' => function ($value) { return str_replace(' ', '', $value);  },
                            'ExpirationDate' => 
                            function ($value) {
                                $parsedDate = DateTime::createFromFormat('m / y', $value)->format('Y-m-01');
                                return isset($parsedDate) && trim($parsedDate)!=='' ? $parsedDate : null; }
                        ],
                        'typecastAfterValidate' => true,
                        'typecastBeforeSave' => false,
                        'typecastAfterFind' => false,
                    ],
                ];
    }
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CardNumder', 'CardHolder', 'ExpirationDate', 'cvv', 'CustomID', 'Sum', 'CurrencyID'], 'required'],
            [['ExpirationDate', 'Time'], 'safe'],
            [['CustomID', 'done', 'CurrencyID'], 'integer'],
            [['Sum'], 'number'],
            [['CardNumder'], 'string', 'max' => 19],
            [['CardHolder'], 'string', 'max' => 255],
            [['cvv'], 'string', 'max' => 3],
            [['cvv'], 'string', 'min' => 3],
            [['cvv'], 'number'],
            [['CurrencyID'], 'exist', 'skipOnError' => true, 'targetClass' => Forexrate::className(), 'targetAttribute' => ['CurrencyID' => 'ID']],
            [['CustomID'], 'exist', 'skipOnError' => true, 'targetClass' => Custom::className(), 'targetAttribute' => ['CustomID' => 'ID']],
            [['CardHolder'], 'match', 'pattern' => '/^[A-Z ]*$/'],
            [['ExpirationDate'],'date', 'format' => 'php:m / y'],
            [['CardNumder'], \app\components\CreditCardValidator::className()],
            [['ExpirationDate'], \app\components\ExpDateValidator::className()],
            [['cvv'], \app\components\CvvValidator::className()],
        ];
    }
    

    

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'CardNumder' => 'Card Number',
            'CardHolder' => 'Card Holder',
            'ExpirationDate' => 'Expiration Date',
            'cvv' => 'CVC/CVV',
            'CustomID' => 'Order Number',
            'Sum' => 'Sum',
            'Time' => 'Time',
            'done' => 'Done',
            'CurrencyID' => 'Currency',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurrency()
    {
        return $this->hasOne(Forexrate::className(), ['ID' => 'CurrencyID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustom()
    {
        return $this->hasOne(Custom::className(), ['ID' => 'CustomID']);
    }
}
