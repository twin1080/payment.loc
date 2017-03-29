<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Payments';
$this->params['breadcrumbs'][] = $this->title;
?>

        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>

<style>
    .done{
        background-color: darkseagreen !important;
    }

    .failure{
        background-color: darksalmon !important;
    }

</style>
<div class="payment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'CardNumder',
            'CardHolder',
            'ExpirationDate',
            //'cvv',
             'CustomID',
             'Sum',
             [
                'attribute'=>'CurrencyID',
                'label' => 'Currency',
                'value' => function ($model) {
                    return (string)$model->getCurrency()->one()->Name;
                },
             ],
    
            [
                'attribute'=>'UserID',
                'label' => 'Customer',
                'value' => function ($model) {
                    return (string)$model->getUser()->one()->username;
                },
             ],
          'done',
            'Time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
        'rowOptions' => function ($model, $key, $index, $grid) {
            return ['class' => $model->done ? 'done' : 'failure'];
            
}
    
    
    ]); ?>
    
        <br/>
    <b class ='done'>Green</b> -- payment is done. <b class ='failure'>Red</b> - failure.
</div>
