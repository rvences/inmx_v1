<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\ConductaagresorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="conductaagresor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cedula_id') ?>

    <?= $form->field($model, 'bebidaalcoholica') ?>

    <?= $form->field($model, 'estupefaciente') ?>

    <?= $form->field($model, 'frecuenciasocial_id') ?>

    <?php // echo $form->field($model, 'medicamentocontrolado') ?>

    <?php // echo $form->field($model, 'agredidaefectoalcohol') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
