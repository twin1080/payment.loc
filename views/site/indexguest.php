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
        echo 'If you are admin, please login as admin for watching the list of payments. If you want to waste your money, please, login. If you do not have account yet, please, sign up.'  ?>
        </p>
        
        <p>
            <?php
                $linkToLogin = Html::a('Login',Url::to(['site/login']), ['class' => 'btn btn-lg btn-success', 'style' => 'width: 160px; margin: 10px;']);
                $linkToSignup = Html::a('Sign up',Url::to(['site/signup']), ['class' => 'btn btn-lg btn-success', 'style' => 'width: 160px; margin: 10px;']);//160px; margin: 10px;']);
            echo $linkToLogin.$linkToSignup ?>
        </p>
    </div>
</div>
