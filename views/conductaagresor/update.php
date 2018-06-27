<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Conductaagresor */

$this->title = 'Actualizando datos generales de conducta del agresor: ' . $model->cedula_id . 'CA-' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Conducta del Agresor', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Folio Conducta del Agresor: '. $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';

?>
<div class="conductaagresor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
