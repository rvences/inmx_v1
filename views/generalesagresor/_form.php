<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Generalesagresor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="generalesagresor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cedula_id')->textInput() ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellido')->textInput(['maxlength' => true]) ?>

    <?php
    $cestadocivil = \yii\helpers\ArrayHelper::map(\app\models\Cestadoscivil::find()->all(), 'id', 'estadocivil');
    $csexo = \yii\helpers\ArrayHelper::map(\app\models\Csexos::find()->all(), 'id', 'sexo');

    ?>

    <?= $form->field($model, 'sexo_id')->dropDownList($csexo, ['prompt' => 'Seleccionar']) ?>

    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fnac')->textInput() ?>

    <?= $form->field($model, 'estadocivil_id')->dropDownList($cestadocivil, ['prompt' => 'Seleccionar']) ?>

    <?= $form->field($model, 'domicilio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'colonia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cpostal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'celular')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'municipio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comunidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idioma')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'religion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'arma')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
