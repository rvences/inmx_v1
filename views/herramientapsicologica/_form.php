<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Herramientapsicologica */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="herramientapsicologica-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cedula_id')->textInput() ?>

    <?php
    $sintomatologiaemocional = \yii\helpers\ArrayHelper::map(\app\models\Csintomatologiasemocionales::find()->all(), 'id', 'sintomatologiaemocional');
    $sintomatologiafisica = \yii\helpers\ArrayHelper::map(\app\models\Csintomatologiasfisicas::find()->all(), 'id', 'sintomatologiafisica');
    $creencia = \yii\helpers\ArrayHelper::map(\app\models\Ccreencias::find()->all(), 'id', 'creencia');
    $factorpsicologico = \yii\helpers\ArrayHelper::map(\app\models\Cfactorespsicologicos::find()->all(), 'id', 'factorpsicologico');
    $relacionpareja = \yii\helpers\ArrayHelper::map(\app\models\Crelacionesparejas::find()->all(), 'id', 'relacionpareja');
    $relacionessociales = \yii\helpers\ArrayHelper::map(\app\models\Crelacionessociales::find()->all(), 'id', 'relacionsocial');
    $relatos = \yii\helpers\ArrayHelper::map(\app\models\Crelatos::find()->all(), 'id', 'relato');

    ?>
    <?= $form->field($model, 'sintomatologiaemocional_id')->dropDownList($sintomatologiaemocional, ['prompt' => 'Seleccionar']); ?>

    <?= $form->field($model, 'sintomatologiafisica_id')->dropDownList($sintomatologiafisica, ['prompt' => 'Seleccionar']); ?>

    <?= $form->field($model, 'creencia_id')->dropDownList($creencia, ['prompt' => 'Seleccionar']); ?>

    <?= $form->field($model, 'factorpsicologico_id')->dropDownList($factorpsicologico, ['prompt' => 'Seleccionar']); ?>

    <?= $form->field($model, 'relacionpareja_id')->dropDownList($relacionpareja, ['prompt' => 'Seleccionar']); ?>

    <?= $form->field($model, 'relacionsocial_id')->dropDownList($relacionessociales, ['prompt' => 'Seleccionar']); ?>

    <?= $form->field($model, 'tratamiento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'relato_id')->dropDownList($relatos, ['prompt' => 'Seleccionar']); ?>

    <?= $form->field($model, 'procesoevaluacion')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
