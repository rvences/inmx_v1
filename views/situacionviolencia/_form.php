<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Situacionviolencia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="situacionviolencia-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cedula_id')->textInput() ?>

    <?php
    $indicadorriesgo = \yii\helpers\ArrayHelper::map(\app\models\Cindicadoresriesgo::find()->all(), 'id', 'indicadorriesgo');
    $tiposeguimiento = \yii\helpers\ArrayHelper::map(\app\models\Ctiposeguimientos::find()->all(), 'id', 'tiposeguimiento');
    $tipoviolencia = \yii\helpers\ArrayHelper::map(\app\models\Ctiposviolencias::find()->all(), 'id', 'tipoviolencia');
    $modalidadviolencia = \yii\helpers\ArrayHelper::map(\app\models\Cmodalidadesviolencia::find()->all(), 'id', 'modalidadviolencia');
    $lugarviolencia = \yii\helpers\ArrayHelper::map(\app\models\Clugaresviolencia::find()->all(), 'id', 'lugarviolencia');
    ?>

    <?= $form->field($model, 'indicadorriesgo_id')->dropDownList($indicadorriesgo, ['prompt' => 'Seleccionar']);?>

    <?= $form->field($model, 'tiposeguimiento_id')->dropDownList($tiposeguimiento, ['prompt' => 'Seleccionar']); ?>

    <?= $form->field($model, 'tipoviolencia_id')->dropDownList($tipoviolencia, ['prompt' => 'Seleccionar']);?>

    <?= $form->field($model, 'modalidadviolencia_id')->dropDownList($modalidadviolencia, ['prompt' => 'Seleccionar']); ?>

    <?= $form->field($model, 'lugarviolencia_id')->dropDownList($lugarviolencia, ['prompt' => 'Seleccionar']); ?>

    <?= $form->field($model, 'lugarviolencia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sufriolesion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lesiondonde')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hospitalizado')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
