<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'จัดการข้อมูลสมาชิกคริสตจักร',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'encodeLabels' => false,
        'items' => [
            ['label' => '<span class="glyphicon glyphicon-home"></span> หน้าแรก', 'url' => ['/site/index']],
            ['label' => '<span class="glyphicon glyphicon-th-large"></span> ข้อมูลคริสตจักรภาค', 'url' => ['/pak/index'], 'visible' => !Yii::$app->user->isGuest],
            ['label' => '<span class="glyphicon glyphicon-king"></span> ข้อมูลคริสตจักร', 'url' => ['/church/index'], 'visible' => !Yii::$app->user->isGuest],
            ['label' => '<span class="glyphicon glyphicon-user"></span> ข้อมูลสมาชิก', 'url' => ['/member/index'], 'visible' => !Yii::$app->user->isGuest],
            Yii::$app->user->isGuest ?
            ['label' => '<span class="glyphicon glyphicon-hand-down"></span> เข้าสู่ระบบ', 'url' => ['/user/security/login']] :
            ['label' => '<span class="glyphicon glyphicon-cog"></span> บัญชี(' . Yii::$app->user->identity->username . ')', 'items'=>[
                ['label' => '<span class="glyphicon glyphicon-search"></span> ข้อมูลส่วนตัว', 'url' => ['/user/settings/profile']],
                ['label' => '<span class="glyphicon glyphicon-wrench"></span> เปลี่ยนรหัสผ่าน', 'url' => ['/user/settings/account']],
                ['label' => '<span class="glyphicon glyphicon-off"></span> ออกจาระบบ', 'url' => ['/user/security/logout'],'linkOptions' => ['data-method' => 'post']],
            ]],
            ['label' => '<span class="glyphicon glyphicon-hand-up"></span> สมัครสมาชิก', 'url' => ['/user/registration/register'], 'visible' => Yii::$app->user->isGuest],
        ],
    ]);
    
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; จัดการข้อมูลสมาชิกคริสตจักร <?= date('Y') ?></p>

        <p class="pull-right"> พัฒนาโดย ฝ่ายสารสนเทศ</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
