<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Conductaagresor */

$this->title = 'Creando nuevo registro de conducta del agresor';
$this->params['breadcrumbs'][] = ['label' => 'Conducta del agresor', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="conductaagresor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
