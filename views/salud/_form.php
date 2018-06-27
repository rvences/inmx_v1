<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Salud */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="salud-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cedula_id')->textInput() ?>

    <?= $form->field($model, 'medicamentocontrolado')->radioList(['S' => 'Si', 'N' => 'No', 'X'=> 'Se Desconoce'])?>

    <?= $form->field($model, 'bebidaalcoholica')->radioList(['S' => 'Si', 'N' => 'No']);  ?>

    <?= $form->field($model, 'estupefaciente')->radioList(['S' => 'Si', 'N' => 'No']);  ?>

    <?php
    $cfrecuenciasocial = \yii\helpers\ArrayHelper::map(\app\models\Cfrecuenciasocial::find()->all(), 'id', 'frecuenciasocial');

    ?>
    <?= $form->field($model, 'frecuenciasocial_id')->dropDownList($cfrecuenciasocial, ['prompt' => 'Seleccionar']);?>

    <?= $form->field($model, 'serviciomedico')->radioList(['S' => 'Si', 'N' => 'No']); ?>

    <?= $form->field($model, 'queserviciomedico')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'padeceenfermedad')->radioList(['S' => 'Si', 'N' => 'No']);  ?>

    <?= $form->field($model, 'quepadeceenfermedad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'padecediscapacidad')->radioList(['S' => 'Si', 'N' => 'No']); ?>

    <?= $form->field($model, 'quepadecediscapacidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'embarazada')->radioList(['S' => 'Si', 'N' => 'No']);  ?>

    <?= $form->field($model, 'embarazadameses')->textInput() ?>

    <?= $form->field($model, 'riesgoembarazo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
