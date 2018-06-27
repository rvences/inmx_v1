<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Generaleshijos */

$this->title = 'Creando nuevo registro de hijos';
$this->params['breadcrumbs'][] = ['label' => 'Generales hijos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="generaleshijos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
