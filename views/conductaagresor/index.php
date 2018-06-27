<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ConductaagresorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Conducta del Agresor';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="conductaagresor-index">

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
            'bebidaalcoholica',
            'estupefaciente',
            'frecuenciasocial.frecuenciasocial',
            //'medicamentocontrolado',
            //'agredidaefectoalcohol',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
