<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Payment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CardNumder')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CardHolder')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ExpirationDate')->textInput() ?>

    <?= $form->field($model, 'cvv')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CustomID')->textInput() ?>

    <?= $form->field($model, 'Sum')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Time')->textInput() ?>

    <?= $form->field($model, 'done')->textInput() ?>

    <?= $form->field($model, 'CurrencyID')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
