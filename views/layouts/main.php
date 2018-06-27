<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems = [
            ['label' => 'Cédula', 'url' => ['/cedula/index'],],

            ['label' => 'Generales', 'items'=> array(
                ['label' => 'Generales Usuaria', 'url' => ['/generalesusuaria/index'],],
                ['label' => 'Generales Hijos', 'url' => ['/generaleshijos/index'],],
                ['label' => 'Generales Allegados', 'url' => ['/generalesallegados/index'],],

            )],
            ['label' => 'Estrato Social', 'url' => ['/estratosocial/index'],],
            ['label' => 'Salud', 'url' => ['/salud/index'],],
            ['label' => 'Herramientas', 'items'=> array(
                ['label' => 'Herramienta Psicológica', 'url' => ['/herramientapsicologica/index'],],
                ['label' => 'Herramienta Jurídica', 'url' => ['/herramientajuridica/index'],],
                ['label' => 'Herramienta Social', 'url' => ['/herramientasocial/index'],],

            )],

            ['label' => 'Agresor', 'items'=> array(
                ['label' => 'Situación de Violencia', 'url' => ['/situacionviolencia/index'],],
                ['label' => 'Datos específicos Agresor', 'url' => ['/generalesagresor/index'],],
                ['label' => 'Salud Agresor', 'url' => ['/saludagresor/index'],],
                ['label' => 'Estrato Social Agresor', 'url' => ['/estratosocialagresor/index'],],
                ['label' => 'Conducta Agresor', 'url' => ['/conductaagresor/index'],],
            )],

            ['label' => 'Control Interno', 'url' => ['/controlinterno/index'],],

            ['label' => 'Personal', 'items'=> array(
                ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']],
            )],

        ];

    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; INMX Xalapa <?= date('Y') ?></p>

        <p class="pull-right"><a href="http://www.nibira.com">Nibira</a></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
