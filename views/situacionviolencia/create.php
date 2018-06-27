<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Situacionviolencia */

$this->title = 'Creando nuevo registro de Situación de Violencia';
$this->params['breadcrumbs'][] = ['label' => 'Situación de Violencia', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="situacionviolencia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
