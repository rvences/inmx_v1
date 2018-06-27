<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\HerramientasocialSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="herramientasocial-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cedula_id') ?>

    <?= $form->field($model, 'situacion') ?>

    <?= $form->field($model, 'tipogestion') ?>

    <?= $form->field($model, 'procedimiento') ?>

    <?php // echo $form->field($model, 'institucion_id') ?>

    <?php // echo $form->field($model, 'oficio') ?>

    <?php // echo $form->field($model, 'fecha') ?>

    <?php // echo $form->field($model, 'observaciones') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
