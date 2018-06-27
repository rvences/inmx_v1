<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cedula */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cedula-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'foliocae')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'foliovictima')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'folioevento')->textInput(['maxlength' => true]) ?>

    <?php
    $tipoatencion = \yii\helpers\ArrayHelper::map(\app\models\Ctipoatencion::find()->all(), 'id', 'tipoatencion');
    $tipoasesoria = \yii\helpers\ArrayHelper::map(\app\models\Ctipoasesoria::find()->all(), 'id', 'tipoasesoria');
    ?>

    <?= $form->field($model, 'tipoatencion_id')->dropDownList($tipoatencion, ['prompt' => 'Seleccionar']);?>

    <?= $form->field($model, 'tipoasesoria_id')->dropDownList($tipoasesoria, ['prompt' => 'Seleccionar']);?>

    <?= $form->field($model, 'demanda')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
