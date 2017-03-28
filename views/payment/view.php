<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\ForexRate;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */
/* @var $model app\models\Payment */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Payments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>

<div class="payment-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'CardNumder',
            'CardHolder',
            'ExpirationDate',
            'cvv',
            'CustomID',
            'Sum',
            'Time',
            'done',
            [
                'attribute'=>'CurrencyID',
                'label' => 'Currency',
                'value' => function ($model) {
                    return (string)$model->getCurrency()->one()->Name;
                },
            ]
        ],
    ]) ?>

</div>
