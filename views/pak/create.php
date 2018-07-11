<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pak */

$this->title = 'เพิ่มรายการ';
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลคริสตจักรภาค', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pak-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
