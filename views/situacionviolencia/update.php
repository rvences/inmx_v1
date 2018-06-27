<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Situacionviolencia */

$this->title = 'Actualizando datos Situación de Violencia: ' . $model->cedula_id . 'HS-' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Situación de Violencia', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Folio Situación de Violencia: '. $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';

?>
<div class="situacionviolencia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
