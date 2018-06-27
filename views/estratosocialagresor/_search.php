<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\EstratosocialagresorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estratosocialagresor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cedula_id') ?>

    <?= $form->field($model, 'ocupacion_id') ?>

    <?= $form->field($model, 'tipopercepcion_id') ?>

    <?= $form->field($model, 'ingresomensual') ?>

    <?php // echo $form->field($model, 'nivelestudio_id') ?>

    <?php // echo $form->field($model, 'estadoestudio_id') ?>

    <?php // echo $form->field($model, 'servidorpublico') ?>

    <?php // echo $form->field($model, 'servidorpublicocargo') ?>

    <?php // echo $form->field($model, 'servidorpublicioinstitucion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
