<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Saludagresor */

$this->title = 'Actualizando datos generales de salud del agresor folio: ' . $model->cedula_id . 'SA-' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Salud Agresor', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Folio Salud Agresor: '. $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';

?>
<div class="saludagresor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
