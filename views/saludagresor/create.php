<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Saludagresor */

$this->title = 'Creando nuevo registro de Salud del agresor';
$this->params['breadcrumbs'][] = ['label' => 'Salud del agresor', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="saludagresor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
