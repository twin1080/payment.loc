<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User
/* @var $this yii\web\View */
/* @var $model app\models\Custom */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="custom-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID')->textInput(['maxlength' => true, 'readonly' => true]) ?>
    
    <?= $form->field($model, 'Time')->textInput(['readonly' => true]) ?>
    
    <?= $form->field($model, 'UserID')->dropdownList(
    User::find()->select(['Username', 'ID'])->indexBy('ID')->column(),
    ['prompt'=>'Select user']);?>

    <?= $form->field($model, 'Sum')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
