<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\GeneralesagresorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Generales de los agresores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="generalesagresor-index">

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
            'sexo.sexo',
            //'alias',
            //'fnac',
            //'estadocivil_id',
            //'domicilio',
            //'colonia',
            //'cpostal',
            //'telefono',
            //'celular',
            //'municipio',
            //'comunidad',
            //'idioma',
            //'religion',
            //'arma',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
