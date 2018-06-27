<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Estratosocial */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estratosocial-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $cocupacion = \yii\helpers\ArrayHelper::map(\app\models\Cocupaciones::find()->all(), 'id', 'ocupacion');
    $ctipopercepcion = \yii\helpers\ArrayHelper::map(\app\models\Ctipospercepciones::find()->all(), 'id', 'tipopercepcion');
    $cnivelestudio = \yii\helpers\ArrayHelper::map(\app\models\Cnivelestudios::find()->all(), 'id', 'nivelestudio');
    $cestadoestudio = \yii\helpers\ArrayHelper::map(\app\models\Cestadoestudios::find()->all(), 'id', 'estadoestudio');
    ?>
    <?= $form->field($model, 'cedula_id')->textInput() ?>

    <?= $form->field($model, 'ocupacion_id')->dropDownList($cocupacion, ['prompt' => 'Seleccionar']); ?>

    <?= $form->field($model, 'tipopercepcion_id')->dropDownList($ctipopercepcion, ['prompt' => 'Seleccionar']); ?>

    <?= $form->field($model, 'ingresomensual')->textInput() ?>

    <?= $form->field($model, 'conquienvive')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'redapoyo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'religion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idioma')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'programasocial')->radioList(['S' => 'Si', 'N' => 'No']);  ?>

    <?= $form->field($model, 'cualprogramasocial')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nivelestudio_id')->dropDownList($cnivelestudio, ['prompt' => 'Seleccionar']); ?>

    <?= $form->field($model, 'estadoestudio_id')->dropDownList($cestadoestudio, ['prompt' => 'Seleccionar']); ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
