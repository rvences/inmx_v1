<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cedula */

$this->title = 'Consultando conducta de la Cédula: C-' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cédula', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cedula-view">

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
            'foliocae',
            'foliovictima',
            'folioevento',
            'tipoatencion.tipoatencion',
            'tipoasesoria.tipoasesoria',
            'demanda:ntext',
            /*
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',*/
        ],
    ]) ?>

</div>
