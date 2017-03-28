<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Payment acceptance';
?>
<div class="site-indexguest">

    <div class="jumbotron">
        <h1>
            <?php
        echo
            Yii::$app->request->get('done') != 1 ? 'Welcome!' : 'Payment is done!' ?></h1>
        
        <p class="lead">
        <?php
        echo 'If you are admin, please login for watching the list of payments. You can go to form for payment if you are not.' ?>
        </p>
        
        <p>
            <?php
                $linkToLogin = Html::a('Login',Url::to(['site/login']), ['class' => 'btn btn-lg btn-success', 'style' => 'width: 160px; margin: 10px;']);
                 $linkToPay = Html::a('Pay',Url::to(['payment/create']), ['class' => 'btn btn-lg btn-success', 'style' => 'width: 160px; margin: 10px;']);
            echo $linkToPay.$linkToLogin?>
        </p>
    </div>
</div>
