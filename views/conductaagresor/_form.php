<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Conductaagresor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="conductaagresor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cedula_id')->textInput() ?>

    <?= $form->field($model, 'bebidaalcoholica')->radioList(['S' => 'Si', 'N' => 'No']);  ?>

    <?= $form->field($model, 'estupefaciente')->radioList(['S' => 'Si', 'N' => 'No']);  ?>

    <?php
    $cfrecuenciasocial = \yii\helpers\ArrayHelper::map(\app\models\Cfrecuenciasocial::find()->all(), 'id', 'frecuenciasocial');

    ?>
    <?= $form->field($model, 'frecuenciasocial_id')->dropDownList($cfrecuenciasocial, ['prompt' => 'Seleccionar']);?>


    <?= $form->field($model, 'medicamentocontrolado')->radioList(['S' => 'Si', 'N' => 'No', 'X'=> 'Se Desconoce'])?>

    <?= $form->field($model, 'agredidaefectoalcohol')->radioList(['S' => 'Si', 'N' => 'No', 'X'=> 'Se Desconoce'])?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
