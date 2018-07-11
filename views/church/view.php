<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Church */

$this->title = $model->church_name;
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลคริสตจักร', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="church-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('ปรับปรุงรายการ', ['update', 'id' => $model->id_church], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบรายการ', ['delete', 'id' => $model->id_church], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'ยืนยันที่จะลบข้อมูลชุดนี้ ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_church',
            'church_name',
            'id_pak',
            'church_date',
        ],
    ]) ?>

</div>
