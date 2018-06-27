<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Estratosocialagresor */

$this->title = 'Actualizando datos generales del estrato social agresor folio: ' . $model->cedula_id . 'EA-' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Estrato Social Agresor ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Folio Estrato Social Agresor: '. $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="estratosocialagresor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
