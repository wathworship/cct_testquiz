<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Church */

$this->title = 'ปรับปรุงรายการคริสตจักร: ' . $model->church_name;
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลคริสตจักร', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->church_name, 'url' => ['view', 'id' => $model->id_church]];
$this->params['breadcrumbs'][] = 'ปรับปรุงรายการ';
?>
<div class="church-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
