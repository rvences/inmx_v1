<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Herramientajuridica */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="herramientajuridica-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cedula_id')->textInput() ?>

    <?php
    $tipodemanda = \yii\helpers\ArrayHelper::map(\app\models\Ctiposdemandas::find()->all(), 'id', 'tipodemanda');

    ?>
    <?= $form->field($model, 'tipodemanda_id')->dropDownList($tipodemanda, ['prompt' => 'Seleccionar']); ?>

    <?= $form->field($model, 'relatohechos')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'situacionlegal')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'procedimientolegal')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'alcances')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
