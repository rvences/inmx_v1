<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Estratosocial */

$this->title = 'Creando nuevo registro de Estrato social';
$this->params['breadcrumbs'][] = ['label' => 'Estrato Social', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estratosocial-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
