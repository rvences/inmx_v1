<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\SituacionviolenciaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="situacionviolencia-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cedula_id') ?>

    <?= $form->field($model, 'indicadorriesgo_id') ?>

    <?= $form->field($model, 'tiposeguimiento_id') ?>

    <?= $form->field($model, 'tipoviolencia_id') ?>

    <?php // echo $form->field($model, 'modalidadviolencia_id') ?>

    <?php // echo $form->field($model, 'lugarviolencia_id') ?>

    <?php // echo $form->field($model, 'lugarviolencia') ?>

    <?php // echo $form->field($model, 'sufriolesion') ?>

    <?php // echo $form->field($model, 'lesiondonde') ?>

    <?php // echo $form->field($model, 'hospitalizado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
