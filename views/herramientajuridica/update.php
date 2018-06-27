<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Herramientajuridica */

$this->title = 'Actualizando datos Herramienta Jurídica: ' . $model->cedula_id . 'HJ-' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Herramienta Jurídica', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Folio Herramienta Jurídica: '. $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="herramientajuridica-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
