<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Member */

$this->title = 'ปรับปรุงรายการ: ' . $model->member_code;
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลสมาชิก', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->member_code, 'url' => ['view', 'id' => $model->id_member]];
$this->params['breadcrumbs'][] = 'ปรับปรุงรายการ';
?>
<div class="member-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
