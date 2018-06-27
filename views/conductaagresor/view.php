<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Conductaagresor */

$this->title = 'Consultando conducta del agresor del folio: ' . $model->cedula_id . 'CA-' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Conducta del agresor', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="conductaagresor-view">

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
            'bebidaalcoholica',
            'estupefaciente',
            'frecuenciasocial.frecuenciasocial',
            'medicamentocontrolado',
            'agredidaefectoalcohol',
        ],
    ]) ?>

</div>
