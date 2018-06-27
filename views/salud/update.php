<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Salud */

$this->title = 'Actualizando datos generales de salud folio: ' . $model->cedula_id . 'S-' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Salud', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Folio Salud: '. $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';

?>
<div class="salud-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
