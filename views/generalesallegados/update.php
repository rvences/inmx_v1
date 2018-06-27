<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Generalesallegados */

$this->title = 'Actualizando datos generales del allegado folio: ' . $model->cedula_id . 'H-' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Generales Allegados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Folio Allegado: '. $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';

?>
<div class="generalesallegados-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
