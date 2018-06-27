<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Saludagresor */

$this->title = 'Consultando salud del agresor folio: ' . $model->cedula_id . 'SA-' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Salud agresor', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="saludagresor-view">

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
            'serviciomedico',
            'queserviciomedico',
            'padeceenfermedad',
            'quepadeceenfermedad',
            'padecediscapacidad',
            'quepadecediscapacidad',
        ],
    ]) ?>

</div>
