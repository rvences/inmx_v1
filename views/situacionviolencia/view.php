<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Situacionviolencia */

$this->title = 'Consultando situación de violencia del folio: ' . $model->cedula_id . 'SV-' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Situación de Violencia', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="situacionviolencia-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Está seguro de eliminar este elemento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'cedula_id',
            'indicadorriesgo.indicadorriesgo',
            'tiposeguimiento.tiposeguimiento',
            'tipoviolencia.tipoviolencia',
            'modalidadviolencia.modalidadviolencia',
            'lugarviolencia.lugarviolencia',
            'lugarviolencia',
            'sufriolesion',
            'lesiondonde',
            'hospitalizado',
        ],
    ]) ?>

</div>
