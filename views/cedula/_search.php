<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\CedulaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cedula-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'foliocae') ?>

    <?= $form->field($model, 'foliovictima') ?>

    <?= $form->field($model, 'folioevento') ?>

    <?= $form->field($model, 'tipoatencion_id') ?>

    <?php // echo $form->field($model, 'tipoasesoria_id') ?>

    <?php // echo $form->field($model, 'demanda') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
