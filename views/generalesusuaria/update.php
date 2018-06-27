<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Generalesusuaria */

$this->title = 'Actualizando datos generales del folio: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Generales Usuaria', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Folio: '. $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="generalesusuaria-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
