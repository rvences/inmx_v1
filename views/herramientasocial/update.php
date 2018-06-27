<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Herramientasocial */

$this->title = 'Actualizando datos Herramienta Social: ' . $model->cedula_id . 'HS-' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Herramienta Social', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Folio Herramienta Social: '. $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';

?>
<div class="herramientasocial-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
