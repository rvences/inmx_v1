<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\ControlinternoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="controlinterno-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cedula_id') ?>

    <?= $form->field($model, 'requiereproteccion') ?>

    <?= $form->field($model, 'delitofuerofederal') ?>

    <?= $form->field($model, 'informousuaria') ?>

    <?php // echo $form->field($model, 'solicitaproteccion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
