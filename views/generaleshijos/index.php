<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\GeneraleshijosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Generales Hijos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="generaleshijos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Registrar Nuevo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            'cedula_id',
            'id',
            'generalesusuaria.nombre',
            'nombre',
            'escolaridad',
            'edad',
            //'conquienvive',
            //'servicio',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
