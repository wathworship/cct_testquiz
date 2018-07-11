<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use app\models\Church;
use app\models\Pak;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MemberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ข้อมูลสมาชิก';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-index">

    <p>
        <?= Html::a('เพิ่มรายการ', ['create'], ['class' => 'btn btn-success pull-right']) ?>
    </p>

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn','header' => 'ลำดับ'],

            //'id_member',
            'member_code',
            'member_name',
            'member_lastname',
            'member_tel',
            //'id_church',
            [
                'attribute' => 'ชื่อคริสตจักร',
                'value' => 'church.church_name',
                'filter' => Html::activeDropDownList($searchModel, 'id_church', ArrayHelper::map(Church::find()->asArray()->all(), 'id_church', 'church_name'),['class'=>'form-control','prompt' => 'เลือกคริสตจักร']),
            ],
            [
                'attribute' => 'ชื่อคริสตจักรภาค',
                'value' => 'church.pak.pak_name',
                //'filter' => Html::activeDropDownList($searchModel, 'id_pak', ArrayHelper::map(Pak::find()->asArray()->all(), 'id_pak', 'pak_name'),['class'=>'form-control','prompt' => 'เลือกคริสตจักร']),
            ],
            //'id_user',
            'member_date',

            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'ดู',
                'options'=>['style'=>'width:50px;'],
                'buttonOptions'=>['class'=>'btn btn-default'],
                'template'=>'<div class="btn-group btn-group-sm text-center" role="group">  {view} </div>'
                ],
                [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'แก้ไข',
                'options'=>['style'=>'width:50px;'],
                'buttonOptions'=>['class'=>'btn btn-info'],
                'template'=>'<div class="btn-group btn-group-sm text-center" role="group">  {update} </div>'
                ],
                [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'ลบ',
                'options'=>['style'=>'width:50px;'],
                'buttonOptions'=>['class'=>'btn btn-danger'],
                'template'=>'<div class="btn-group btn-group-sm text-center" role="group">  {delete} </div>'
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
