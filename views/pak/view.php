<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pak */

$this->title = $model->pak_name;
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลคริสตจักรภาค', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pak-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('ปรับปรุงรายการ', ['update', 'id' => $model->id_pak], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบรายการ', ['delete', 'id' => $model->id_pak], [
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
            //'id_pak',
            'pak_name',
            'pak_date',
        ],
    ]) ?>

</div>
