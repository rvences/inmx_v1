<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Herramientajuridica */

$this->title = 'Creando nuevo registro de Herramienta Jurídica';
$this->params['breadcrumbs'][] = ['label' => 'Herramienta Jurídica', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="herramientajuridica-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
