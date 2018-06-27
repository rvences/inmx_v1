<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\EstratosocialSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estratosocial-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cedula_id') ?>

    <?= $form->field($model, 'ocupacion_id') ?>

    <?= $form->field($model, 'tipopercepcion_id') ?>

    <?= $form->field($model, 'ingresomensual') ?>

    <?php // echo $form->field($model, 'conquienvive') ?>

    <?php // echo $form->field($model, 'redapoyo') ?>

    <?php // echo $form->field($model, 'religion') ?>

    <?php // echo $form->field($model, 'idioma') ?>

    <?php // echo $form->field($model, 'programasocial') ?>

    <?php // echo $form->field($model, 'cualprogramasocial') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
