<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\GeneraleshijosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="generaleshijos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cedula_id') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'escolaridad') ?>

    <?= $form->field($model, 'edad') ?>

    <?php // echo $form->field($model, 'conquienvive') ?>

    <?php // echo $form->field($model, 'servicio') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
