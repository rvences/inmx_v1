<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Herramientapsicologica */

$this->title = 'Actualizando datos Herramienta Psicológica: ' . $model->cedula_id . 'HP-' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Herramienta Psicológica', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Folio Herramienta Psicológica: '. $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="herramientapsicologica-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
