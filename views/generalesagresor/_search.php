<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\GeneralesagresorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="generalesagresor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cedula_id') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'apellido') ?>

    <?= $form->field($model, 'sexo_id') ?>

    <?php // echo $form->field($model, 'alias') ?>

    <?php // echo $form->field($model, 'fnac') ?>

    <?php // echo $form->field($model, 'estadocivil_id') ?>

    <?php // echo $form->field($model, 'domicilio') ?>

    <?php // echo $form->field($model, 'colonia') ?>

    <?php // echo $form->field($model, 'cpostal') ?>

    <?php // echo $form->field($model, 'telefono') ?>

    <?php // echo $form->field($model, 'celular') ?>

    <?php // echo $form->field($model, 'municipio') ?>

    <?php // echo $form->field($model, 'comunidad') ?>

    <?php // echo $form->field($model, 'idioma') ?>

    <?php // echo $form->field($model, 'religion') ?>

    <?php // echo $form->field($model, 'arma') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
