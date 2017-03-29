<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Payment acceptance';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>
            <?php
        echo
            Yii::$app->request->get('done') != 1 ? 'Welcome!' : 'Payment is done!' ?></h1>
        
        <p class="lead">
        <?php
        echo
        Yii::$app->user->isGuest 
            ?'If you are admin, please login for watching the list of payments. You can go to form for payment if you are not.' 
            :'Hello! Please, press the button below for watching list of payments.' ?>
        </p>
        
        <p>
            <?php
                 $linkToPay = Html::a('Pay',Url::to(['payment/create']), ['class' => 'btn btn-lg btn-success', 'style' => 'width: 160px; margin: 10px;']);
            echo $linkToPay ?>
        </p>
    </div>

    
  <div class="body-content">
    
            <div class="col-lg-4">
                <h2>Payments</h2>

                <p>There is list of all your payments which you made.</p>

                <p> <?= Html::a('Here>>',Url::toRoute('payment/index'),  ['class' => 'btn btn-default']) ?></p>
            </div>
    </div>
    
</div>
