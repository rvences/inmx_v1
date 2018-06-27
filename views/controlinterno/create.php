<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Controlinterno */

$this->title = 'Creando nuevo registro de control interno';
$this->params['breadcrumbs'][] = ['label' => 'Control Interno', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="controlinterno-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
