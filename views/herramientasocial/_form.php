<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Herramientasocial */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="herramientasocial-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cedula_id')->textInput() ?>

    <?= $form->field($model, 'situacion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tipogestion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'procedimiento')->textarea(['rows' => 6]) ?>

    <?php
    $institucion = \yii\helpers\ArrayHelper::map(\app\models\Cinstituciones::find()->all(), 'id', 'institucion');
    ?>
    <?= $form->field($model, 'institucion_id')->dropDownList($institucion, ['prompt' => 'Seleccionar']); ?>

    <?= $form->field($model, 'oficio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'observaciones')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
