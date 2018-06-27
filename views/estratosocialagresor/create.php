<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Estratosocialagresor */

$this->title = 'Creando nuevo registro de Estrato social Agresor';
$this->params['breadcrumbs'][] = ['label' => 'Estrato Social Agresor', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estratosocialagresor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
