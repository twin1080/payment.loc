<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\ForexRate;

/* @var $this yii\web\View */
/* @var $model app\models\Payment */

$this->registerCssFile('css/creditcard.css');
$this->registerCssFile('http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
$this->title = 'Create payment';
$this->params['breadcrumbs'][] = ['label' => 'Payments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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
<div class="payment-create">
 <?php $form = ActiveForm::begin(); ?>
    <div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-4">
  <h1><?= Html::encode($this->title) ?></h1>
    <?= $form->field($model, 'CustomID')->textInput(['autofocus'=>true]) ?>
           <div class="row">
               <div class="col-xs-7 col-md-7">
    <?= $form->field($model, 'Sum')->textInput(['maxlength' => true]) ?>
</div>
               <div class="col-xs-5 col-md-5 pull-right">
     <?= $form->field($model, 'CurrencyID')->dropdownList(
    ForexRate::find()->select(['Name', 'ID'])->indexBy('ID')->column(),
    ['prompt'=>'Select']);?>
                </div>
                  </div>  
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table" >
                    <div class="row display-tr" >
                        <h3 class="panel-title display-td" >Card details</h3>
                        <div class="display-td" >                            
                            <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                        </div>
                    </div>                    
                </div>
                <div class="panel-body">
                    <form role="form" id="payment-form" method="POST" action="javascript:void(0);">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                              <?= $form->field($model, 'CardNumder')->textInput(['maxlength' => true,
                                                                                               'type'=>'tel',
                                                                                               'class'=>'form-control',
                                                                                               'placeholder'=>'Valid Card Number',
                                                                                               'required'=>true,
                                                                                              ])  ?>
                                </div>                            
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                   
                                    <?= $form->field($model, 'CardHolder')->textInput(['maxlength' => true,
                                                                                       'class'=>'form-control',
                                                                                       'required'=>true])  ?>
                                </div>
                            </div>                        
                        </div>
                        
                        <div class="row">
                            <div class="col-xs-7 col-md-7">
                                <div class="form-group">

                                    <?= $form->field($model, 'ExpirationDate')->textInput(['type'=>'tel', 
                                                                                           'class'=>'form-control',
                                                                                           'placeholder'=>'MM / YY',
                                                                                           'required' => true,
                                                                                          'value' =>  date('Y-m-d', strtotime( $model->ExpirationDate ))  != '1970-01-01' ? date( 'm / y', strtotime( $model->ExpirationDate ) ) : $model->ExpirationDate 
                                                                                          ]) ?>
                                </div>
                            </div>
                            <div class="col-xs-5 col-md-5 pull-right">
                                <div class="form-group">

                                    <?= $form->field($model, 'cvv')->textInput(['maxlength' => true,
                                                                                'type'=>"tel", 
                                                                                'class'=>"form-control",
                                                                                'placeholder'=>"CVC",
                                                                                'required'=>true]) ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                                <div class="col-xs-12">
                            <?= Html::submitButton('Pay now', ['class' => $model->isNewRecord ? 'btn btn-success btn-lg btn-block subscribe' : 'btn btn-primary btn-lg btn-block subscribe']) ?>
                        </div>
                            
                        </div>
                        <div class="row" style="display:none;">
                            <div class="col-xs-12">
                                <p class="payment-errors"></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>            
        </div>            
        <br>
    </div>
</div>
 
    <?php ActiveForm::end(); ?>
 
</div>
