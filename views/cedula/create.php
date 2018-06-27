<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Cedula */

$this->title = 'Creando nueva Cedula';
$this->params['breadcrumbs'][] = ['label' => 'Cedulas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cedula-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
