<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Estratosocial */

$this->title = 'Actualizando datos generales del estrato social folio: ' . $model->cedula_id . 'E-' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Estrato Social', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Folio Estrato Social: '. $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="estratosocial-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
