<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cedula */

$this->title = 'Actualizando Cédula: CA-' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cédula', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Folio Cédula: '. $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';

?>
<div class="cedula-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
