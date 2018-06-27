<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\SaludagresorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="saludagresor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cedula_id') ?>

    <?= $form->field($model, 'serviciomedico') ?>

    <?= $form->field($model, 'queserviciomedico') ?>

    <?= $form->field($model, 'padeceenfermedad') ?>

    <?php // echo $form->field($model, 'quepadeceenfermedad') ?>

    <?php // echo $form->field($model, 'padecediscapacidad') ?>

    <?php // echo $form->field($model, 'quepadecediscapacidad') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
