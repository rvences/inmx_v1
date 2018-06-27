<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Generalesagresor */

$this->title = 'Consultando datos generales agresor del folio: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Generales Agresor', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="generalesagresor-view">

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
            'sexo.sexo',
            'alias',
            'fnac',
            'estadocivil.estadocivil',
            'domicilio',
            'colonia',
            'cpostal',
            'telefono',
            'celular',
            'municipio',
            'comunidad',
            'idioma',
            'religion',
            'arma',
        ],
    ]) ?>

</div>
