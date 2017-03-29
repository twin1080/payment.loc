<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Payment acceptance';
?>
<div class="site-indexadmin">

    <div class="jumbotron">
        <h1>
            <?php
        echo
            'Welcome!' ?></h1>
        
        <p class="lead">
        <?php
        echo
        Yii::$app->user->isGuest 
            ?'If you are admin, please login for watching the list of payments. You can go to form for payment if you are not.' 
            :'Hello! Please, press the button below for watching list of payments.' ?>
        </p>
        
        <p>
            <?php
                $linkToPayments = Html::a('Watch all payments',Url::to(['payment/index']), ['class' => 'btn btn-lg btn-success']);
                $linkToLogin = Html::a('Login',Url::to(['site/login']), ['class' => 'btn btn-lg btn-success', 'style' => 'width: 160px; margin: 10px;']);
                 $linkToPay = Html::a('Pay',Url::to(['payment/create']), ['class' => 'btn btn-lg btn-success', 'style' => 'width: 160px; margin: 10px;']);
            echo
            
            Yii::$app->user->isGuest 
                ? $linkToPay.$linkToLogin
                 : '' ?>
        </p>
    </div>

    
  <div class="body-content">
            <div class="col-lg-4">
                <h2>Orders</h2>

                <p>You can create new orders which users should pay for.</p>

                <p>
                   <?= Html::a('Here>>',Url::toRoute('custom/index'),  ['class' => 'btn btn-default']) ?>
                </p>
            </div>
            <div class="col-lg-4">
                <h2>Currencies</h2>

                <p>You also can add new currency with rate if you need</p>

                <p> <?= Html::a('Here>>',Url::toRoute('forex-rate/index'),  ['class' => 'btn btn-default']) ?></p>
            </div>
            
            <div class="col-lg-4">
                <h2>Payments</h2>

                <p>There is list of all payments which was made</p>

                <p> <?= Html::a('Here>>',Url::toRoute('payment/index'),  ['class' => 'btn btn-default']) ?></p>
            </div>
    </div>
    
</div>
