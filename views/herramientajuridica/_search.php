<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\HerramientajuridicaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="herramientajuridica-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cedula_id') ?>

    <?= $form->field($model, 'tipodemanda_id') ?>

    <?= $form->field($model, 'relatohechos') ?>

    <?= $form->field($model, 'situacionlegal') ?>

    <?php // echo $form->field($model, 'procedimientolegal') ?>

    <?php // echo $form->field($model, 'alcances') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
