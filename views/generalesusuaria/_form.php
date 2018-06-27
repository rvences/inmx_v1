<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Generalesusuaria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="generalesusuaria-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cedula_id')->textInput() ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fnac')->textInput() ?>

    <?= $form->field($model, 'lugarnac')->textInput(['maxlength' => true]) ?>

    <?php
    $cestadocivil = \yii\helpers\ArrayHelper::map(\app\models\Cestadoscivil::find()->all(), 'id', 'estadocivil');
    $cagresor = \yii\helpers\ArrayHelper::map(\app\models\Cagresor::find()->all(), 'id', 'agresor');

    ?>
    <?= $form->field($model, 'estadocivil_id')->dropDownList($cestadocivil, ['prompt' => 'Seleccionar']) ?>

    <?= $form->field($model, 'agresor_id')->dropDownList($cagresor, ['prompt' => 'Seleccionar']) ?>

    <?= $form->field($model, 'relacion_agresor')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'violencia_pareja')->checkbox(['checked' => false])?>
    <?= $form->field($model, 'violencia_pareja')->radioList(['S' => 'Si', 'N' => 'No']);?>

    <?= $form->field($model, 'domicilio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'colonia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cpostal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'celular')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'municipio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comunidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nohijos')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
