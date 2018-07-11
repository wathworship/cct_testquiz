<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use app\models\Pak;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ChurchSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ข้อมูลคริสตจักร';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="church-index">

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

            //'id_church',
            'church_name',
            //'id_pak',
            [
                'attribute' => 'คริสตจักรภาค',
                'value' => 'pak.pak_name',
                'filter' => Html::activeDropDownList($searchModel, 'id_pak', ArrayHelper::map(Pak::find()->asArray()->all(), 'id_pak', 'pak_name'),['class'=>'form-control','prompt' => 'เลือกคริสตจักรภาค']),
            ],
            'church_date',

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
