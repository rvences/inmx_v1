<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Generalesallegados */

$this->title = 'Creando nuevo registro de allegados';
$this->params['breadcrumbs'][] = ['label' => 'Generales Allegados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="generalesallegados-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
