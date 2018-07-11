<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pak */

$this->title = 'ปรับปรุงรายการ: ' . $model->pak_name;
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลคริสตจักรภาค', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pak_name, 'url' => ['view', 'id' => $model->id_pak]];
$this->params['breadcrumbs'][] = 'ปรับปรุงรายการ';
?>
<div class="pak-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
