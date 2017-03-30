<?php
/**
 * Inspired from http://www.yiiframework.com/extension/eccvalidator/
 *
 * Migrated Yii 1 to Yii 2 Credit card validator
 *
 * @author Bryan Tan <bryantan16@gmail.com>
 */
namespace app\components;

use yii\base\InvalidValueException;
use yii\validators\Validator;
use yii\helpers\Html;
use Yii;
class PaymentValidator extends Validator
{
    public function validateAttribute($model, $attribute)
    {
        if ($model->CustomID != null && $model->getCustom()->one()->UserID != Yii::$app->user->getId() && !Yii::$app->user->can('admin'))
                {
                    $this->addError($model, $attribute, 'You are not allowed to pay for anybody else.', []);
                }
    }
} 

