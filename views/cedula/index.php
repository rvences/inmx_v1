<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\CedulaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cedulas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cedula-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Registrar Nuevo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'foliocae',
            'foliovictima',
            'folioevento',
            'tipoatencion.tipoatencion',
            //'tipoasesoria_id',
            //'demanda:ntext',
            //'created_at',
            //'updated_at',
            //'created_by',
            //'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
