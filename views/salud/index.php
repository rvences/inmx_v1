<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\SaludSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Salud';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salud-index">

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
            'medicamentocontrolado',
            'bebidaalcoholica',
            'estupefaciente',
            //'frecuenciasocial_id',
            //'serviciomedico',
            //'queserviciomedico',
            //'padeceenfermedad',
            //'quepadeceenfermedad',
            //'padecediscapacidad',
            //'quepadecediscapacidad',
            //'embarazada',
            //'embarazadameses',
            //'riesgoembarazo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
