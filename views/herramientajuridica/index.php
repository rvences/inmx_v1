<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\HerramientajuridicaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Herramienta Juridica';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="herramientajuridica-index">

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
            'tipodemanda.tipodemanda',
            'relatohechos:ntext',
            'situacionlegal:ntext',
            //'procedimientolegal:ntext',
            //'alcances:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
