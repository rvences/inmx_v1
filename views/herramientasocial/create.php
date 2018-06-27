<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Herramientasocial */

$this->title = 'Creando nuevo registro de Herramienta Social';
$this->params['breadcrumbs'][] = ['label' => 'Herramienta Social', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="herramientasocial-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
