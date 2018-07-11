<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Church;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Member */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="member-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
    <?= $form->field($model, 'member_code')->textInput(['readonly' => true]) ?>
    </div>
        <div class="col-md-6">
    <?= $form->field($model, 'userone')->textInput(['readonly' => true]) ?>
    </div>
    </div>
    <div class="row">
        <div class="col-md-6">
    <?= $form->field($model, 'member_name')->textInput(['maxlength' => true]) ?>
    </div>
        <div class="col-md-6">
    <?= $form->field($model, 'member_lastname')->textInput(['maxlength' => true]) ?>
    </div>
    </div>
    <div class="row">
        <div class="col-md-6">
    <?= $form->field($model, 'member_tel')->textInput() ?>
    </div>
        <div class="col-md-6">
    <?= $form->field($model, 'id_church')->widget(Select2::classname(), [
          'data' =>  ArrayHelper::map(Church::find()->all(),
           'id_church',
           'church_name'),
          'language' => 'th',
          'options' => ['placeholder' => 'ค้นหาคริสตจักร ...'],
          'pluginOptions' => [
              'allowClear' => true
          ],
      ]); ?>
    </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('บันทึกรายการ', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
