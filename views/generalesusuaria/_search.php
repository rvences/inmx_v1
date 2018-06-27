<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\GeneralesusuariaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="generalesusuaria-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'apellido') ?>

    <?= $form->field($model, 'fnac') ?>

    <?= $form->field($model, 'lugarnac') ?>

    <?php // echo $form->field($model, 'estadocivil_id') ?>

    <?php // echo $form->field($model, 'agresor_id') ?>

    <?php // echo $form->field($model, 'relacion_agresor') ?>

    <?php // echo $form->field($model, 'violencia_pareja') ?>

    <?php // echo $form->field($model, 'domicilio') ?>

    <?php // echo $form->field($model, 'colonia') ?>

    <?php // echo $form->field($model, 'cpostal') ?>

    <?php // echo $form->field($model, 'telefono') ?>

    <?php // echo $form->field($model, 'celular') ?>

    <?php // echo $form->field($model, 'municipio') ?>

    <?php // echo $form->field($model, 'comunidad') ?>

    <?php // echo $form->field($model, 'nohijos') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
