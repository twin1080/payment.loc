<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customs';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .done{
        background-color: darkseagreen !important;
    }
</style>

<?= Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
<div class="custom-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Custom', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'ID',
            'Time',
            'Sum',
            ['class' => 'yii\grid\ActionColumn'],
           ],
    
            'rowOptions' => function ($model, $key, $index, $grid) {
            
            $done = $model->getPayments()->sum('Sum');
    
            return ['class' => $done ? 'done' : ''];
}
    ]); ?>
    
    <br/>
    <b class ='done'>Green</b> - fully paid-up.
</div>
