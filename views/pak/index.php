<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PakSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ข้อมูลคริสตจักรภาค';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pak-index">

    
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

            //'id_pak',
            'pak_name',
            'pak_date',

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
