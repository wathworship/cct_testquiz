<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pak */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pak-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pak_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('บันทึกรายการ', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
