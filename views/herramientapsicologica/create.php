<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Herramientapsicologica */

$this->title = 'Creando nuevo registro de Herramienta Psicologica';
$this->params['breadcrumbs'][] = ['label' => 'Herramienta Psicologica', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="herramientapsicologica-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
