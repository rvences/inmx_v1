<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Herramientapsicologica */

$this->title = 'Consultando herramienta Psicológica del folio: ' . $model->cedula_id . 'HP-' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Herramienta Psicológica', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="herramientapsicologica-view">

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
            'sintomatologiaemocional.sintomatologiaemocional',
            'sintomatologiafisica.sintomatologiafisica',
            'creencia.creencia',
            'factorpsicologico.factorpsicologico',
            'relacionpareja.relacionpareja',
            'relacionsocial.relacionsocial',
            'tratamiento',
            'relato.relato',
            'procesoevaluacion:ntext',
        ],
    ]) ?>

</div>
