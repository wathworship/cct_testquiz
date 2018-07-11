<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Member */

$this->title = $model->member_code;
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลสมาชิก', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('ปรับปรุงรายการ', ['update', 'id' => $model->id_member], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบรายการ', ['delete', 'id' => $model->id_member], [
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
            //'id_member',
            'member_code',
            'member_name',
            'member_lastname',
            'member_tel',
            'church.church_name',
            'church.pak.pak_name',
            'user.username',
            'member_date',
        ],
    ]) ?>

</div>
