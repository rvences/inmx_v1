<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\HerramientapsicologicaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Herramienta Psicologica';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="herramientapsicologica-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Registrar Nuevo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'cedula_id',
            'sintomatologiaemocional.sintomatologiaemocional',
            'sintomatologiafisica.sintomatologiafisica',
            'creencia.creencia',
            //'factorpsicologico_id',
            //'relacionpareja_id',
            //'relacionsocial_id',
            //'tratamiento',
            //'relato_id',
            //'procesoevaluacion:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
