<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;
use app\models\ForexRate;
/* @var $this yii\web\View */
/* @var $model app\models\Payment */
$this->registerCssFile('css/creditcard.css');
$this->registerCssFile('http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');

$this->title = 'Edit payment info: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Payments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>

<script src="customscripts/jquery.payment.js"></script>
<script>
    jQuery(function($) {
      $('[data-numeric]').payment('restrictNumeric');
      $('#<?= Html::getInputId($model, 'CardNumder'); ?>').payment('formatCardNumber');
      $('#<?= Html::getInputId($model, 'ExpirationDate'); ?>').payment('formatCardExpiry');
      $('#<?= Html::getInputId($model, 'cvv'); ?>').payment('formatCardCVC');
      $.fn.toggleInputError = function(erred) {
        this.parent('.form-group').toggleClass('has-error', erred);
        return this;
      };
    });
</script>

        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>

<div class="payment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CardNumder')->textInput(['maxlength' => true,
                                                       'type'=>'tel',
                                                       'placeholder'=>'Valid Card Number',
                                                       'required'=>true,             
                                                      ]) ?>

    <?= $form->field($model, 'CardHolder')->textInput(['maxlength' => true,                                                                                                             'required'=>true]) ?>

    <?= $form->field($model, 'ExpirationDate')->textInput(['type'=>'tel',
                                                           'placeholder'=>'MM / YY',
                                                           'required' => true,
                                                           'value' =>  date('Y-m-d', strtotime( $model->ExpirationDate ))  != '1970-01-01' ? date( 'm / y', strtotime( $model->ExpirationDate ) ) : $model->ExpirationDate 
                                                                                          ]) ?>

    <?= $form->field($model, 'cvv')->textInput(['maxlength' => true,
                                                'type'=>"tel", 
                                                'placeholder'=>"CVC",
                                                'required'=>true]) ?>

    <?= $form->field($model, 'CustomID')->textInput() ?>

    <?= $form->field($model, 'Sum')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'CurrencyID')->dropdownList(
    ForexRate::find()->select(['Name', 'ID'])->indexBy('ID')->column(),
    ['prompt'=>'Select']);?>

    <?= $form->field($model, 'Time')->textInput() ?>

    <?= $form->field($model, 'done')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
  
    

</div>
