<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Estratosocialagresor */

$this->title = 'Consultando datos generales del folio: ' . $model->cedula_id . 'EA-' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Estrato Social Agresor', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estratosocialagresor-view">

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
            'ocupacion.ocupacion',
            'tipopercepcion.tipopercepcion',
            'ingresomensual',
            'nivelestudio.nivelestudio',
            'estadoestudio.estadoestudio',
            'servidorpublico',
            'servidorpublicocargo',
            'servidorpublicioinstitucion',
        ],
    ]) ?>

</div>
