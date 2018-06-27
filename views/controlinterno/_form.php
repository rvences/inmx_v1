<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Controlinterno */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="controlinterno-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cedula_id')->textInput() ?>

    <?= $form->field($model, 'requiereproteccion')->radioList(['S' => 'Si', 'N' => 'No']);  ?>

    <?= $form->field($model, 'delitofuerofederal')->radioList(['S' => 'Si', 'N' => 'No']);  ?>

    <?= $form->field($model, 'informousuaria')->radioList(['S' => 'Si', 'N' => 'No']); ?>

    <?= $form->field($model, 'solicitaproteccion')->radioList(['S' => 'Si', 'N' => 'No']);  ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
