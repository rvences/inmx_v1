<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\SituacionviolenciaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Situación de Violencia';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="situacionviolencia-index">

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
            'indicadorriesgo.indicadorriesgo',
            'tiposeguimiento.tiposeguimiento',
            'tipoviolencia.tipoviolencia',
            //'modalidadviolencia_id',
            //'lugarviolencia_id',
            //'lugarviolencia',
            //'sufriolesion',
            //'lesiondonde',
            //'hospitalizado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
