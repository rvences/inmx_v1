<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Generalesusuaria */

$this->title = 'Creando nuevo registro de datos generales:';
$this->params['breadcrumbs'][] = ['label' => 'Generales Usuarias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="generalesusuaria-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
