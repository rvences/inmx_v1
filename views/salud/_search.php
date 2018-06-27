<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\SaludSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="salud-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cedula_id') ?>

    <?= $form->field($model, 'medicamentocontrolado') ?>

    <?= $form->field($model, 'bebidaalcoholica') ?>

    <?= $form->field($model, 'estupefaciente') ?>

    <?php // echo $form->field($model, 'frecuenciasocial_id') ?>

    <?php // echo $form->field($model, 'serviciomedico') ?>

    <?php // echo $form->field($model, 'queserviciomedico') ?>

    <?php // echo $form->field($model, 'padeceenfermedad') ?>

    <?php // echo $form->field($model, 'quepadeceenfermedad') ?>

    <?php // echo $form->field($model, 'padecediscapacidad') ?>

    <?php // echo $form->field($model, 'quepadecediscapacidad') ?>

    <?php // echo $form->field($model, 'embarazada') ?>

    <?php // echo $form->field($model, 'embarazadameses') ?>

    <?php // echo $form->field($model, 'riesgoembarazo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
