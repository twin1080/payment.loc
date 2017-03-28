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
class CvvValidator extends Validator
{

    public function validateAttribute($object, $attribute)
    {

    }
    
    public function clientValidateAttribute($model, $attribute, $view)
    {
        $label = $model->getAttributeLabel($attribute);
        
        $message = json_encode($label.' is invalid', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        $cardNumberControlId = Html::getInputId($model, 'CardNumder');
        return 
<<<JS
       var cardType = $.payment.cardType($('#$cardNumberControlId').val());
                if (!$.payment.validateCardCVC(value, cardType))
                    {
                        messages.push($message);
                    }
JS;
    }
} 