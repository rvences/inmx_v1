<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Generalesagresor */

$this->title = 'Creando nuevo registro de datos generales del agresor:';
$this->params['breadcrumbs'][] = ['label' => 'Generales Agresor', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="generalesagresor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
