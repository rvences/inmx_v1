<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Controlinterno */

$this->title = 'Actualizando datos de control interno: ' . $model->cedula_id . 'CA-' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Control interno', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Folio Control interno: '. $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';

?>
<div class="controlinterno-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
