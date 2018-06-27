<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\GeneralesallegadosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Generales Allegados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="generalesallegados-index">

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
            'cedula_id',
            'id',
            'nombre',
            'vinculo',
            'edad',
            //'servicio',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
