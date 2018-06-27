<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Generalesagresor */

$this->title = 'Actualizando datos generales del agresor: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Generales Agresor', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Folio: '. $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';

?>
<div class="generalesagresor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
