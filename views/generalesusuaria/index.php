<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\GeneralesusuariaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Generales de las Usuarias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="generalesusuaria-index">

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
            'cedula_id',
            'nombre',
            'apellido',
            'fnac',
            'lugarnac',
            //'estadocivil_id',
            //'agresor_id',
            //'relacion_agresor',
            //'violencia_pareja',
            //'domicilio',
            //'colonia',
            //'cpostal',
            //'telefono',
            //'celular',
            //'municipio',
            //'comunidad',
            //'nohijos',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
