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
use Yii;
class ExpDateValidator extends Validator
{

    public function validateAttribute($object, $attribute)
    {
        $value = str_replace(' ', '', $object->$attribute);
        $result = $this->validateStringedDate($value);
        if (!empty($result)) {
            $this->addError($object, $attribute, $result[0], $result[1]);
        }
    }
    
    public function clientValidateAttribute($model, $attribute, $view)
    {
        $label = $model->getAttributeLabel($attribute);
        
        $message = json_encode($label.' is invalid', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        return 
<<<JS
                var arr = value.split('/');
                if (!$.payment.validateCardExpiry(arr[0], arr[1]))
                    {
                        messages.push($message);
                    }
JS;
    }
    
    
    public function validateStringedDate($stringedDate)
    {
        $creditCardExpiredMonth = explode("/", $stringedDate)[0];
        $creditCardExpiredYear = explode("/", $stringedDate)[1];
        
        $currentMonth = intval(date('n'));
        $currentYear = intval(date('Y'));
        if (is_scalar($creditCardExpiredMonth)) $creditCardExpiredMonth = intval($creditCardExpiredMonth);
        if (is_scalar($creditCardExpiredYear)) $creditCardExpiredYear = intval($creditCardExpiredYear);
        return
        is_integer($creditCardExpiredMonth) && $creditCardExpiredMonth >= 1 && $creditCardExpiredMonth <= 12 &&
        is_integer($creditCardExpiredYear) &&  ($creditCardExpiredYear > $currentYear || ($creditCardExpiredYear==$currentYear && $creditCardExpiredMonth>$currentMonth) ) &&  $creditCardExpiredYear < $currentYear + 10;
    }
    
    
} 