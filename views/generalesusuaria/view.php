<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Generalesusuaria */

$this->title = 'Consultando datos generales del folio: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Generales Usuarias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="generalesusuaria-view">

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
            'nombre',
            'apellido',
            'fnac',
            'lugarnac',
            'estadocivil.estadocivil',
            'agresor.agresor',
            'relacion_agresor',
            'violencia_pareja',
            'domicilio',
            'colonia',
            'cpostal',
            'telefono',
            'celular',
            'municipio',
            'comunidad',
            'nohijos',
        ],
    ]) ?>

</div>
