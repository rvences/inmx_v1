<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Generalesallegados */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="generalesallegados-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cedula_id')->textInput() ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vinculo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'edad')->textInput() ?>

    <?= $form->field($model, 'servicio')->radioList(['S' => 'Si', 'N' => 'No']); ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
