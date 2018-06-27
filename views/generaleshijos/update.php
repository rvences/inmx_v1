<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Generaleshijos */

$this->title = 'Actualizando datos generales del hijo folio: ' . $model->cedula_id . 'H-' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Generales Hijos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Folio Hijo: '. $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="generaleshijos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
