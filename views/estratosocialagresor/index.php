<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\EstratosocialagresorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estrato Social Agresor';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estratosocialagresor-index">

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
            'ocupacion.ocupacion',
            'tipopercepcion.tipopercepcion',
            'ingresomensual',
            //'nivelestudio_id',
            //'estadoestudio_id',
            //'servidorpublico',
            //'servidorpublicocargo',
            //'servidorpublicioinstitucion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
