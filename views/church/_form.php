<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Pak;


/* @var $this yii\web\View */
/* @var $model app\models\Church */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="church-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'church_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'id_pak')->dropDownList(
                ArrayHelper::map(Pak::find()->asArray()->all(), 'id_pak', 'pak_name')
            ) ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('บันทึกรายการ', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
