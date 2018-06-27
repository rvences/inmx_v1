<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ControlinternoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Control internos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="controlinterno-index">

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
            'requiereproteccion',
            'delitofuerofederal',
            'informousuaria',
            //'solicitaproteccion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
