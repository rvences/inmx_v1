<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Saludagresor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="saludagresor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cedula_id')->textInput() ?>

    <?= $form->field($model, 'serviciomedico')->radioList(['S' => 'Si', 'N' => 'No']); ?>

    <?= $form->field($model, 'queserviciomedico')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'padeceenfermedad')->radioList(['S' => 'Si', 'N' => 'No']);  ?>

    <?= $form->field($model, 'quepadeceenfermedad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'padecediscapacidad')->radioList(['S' => 'Si', 'N' => 'No']); ?>

    <?= $form->field($model, 'quepadecediscapacidad')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
