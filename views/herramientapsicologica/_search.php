<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\HerramientapsicologicaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="herramientapsicologica-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cedula_id') ?>

    <?= $form->field($model, 'sintomatologiaemocional_id') ?>

    <?= $form->field($model, 'sintomatologiafisica_id') ?>

    <?= $form->field($model, 'creencia_id') ?>

    <?php // echo $form->field($model, 'factorpsicologico_id') ?>

    <?php // echo $form->field($model, 'relacionpareja_id') ?>

    <?php // echo $form->field($model, 'relacionsocial_id') ?>

    <?php // echo $form->field($model, 'tratamiento') ?>

    <?php // echo $form->field($model, 'relato_id') ?>

    <?php // echo $form->field($model, 'procesoevaluacion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
