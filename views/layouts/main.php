<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use jacmoe\mdpages\components\Nav;
use yii\widgets\Breadcrumbs;

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?= Html::cssFile(YII_DEBUG ? '@web/css/site.css' : '@web/css/site.min.css?v=' . filemtime(Yii::getAlias('@webroot/css/all.min.css'))) ?>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <header>
        <div class="top-bar">
            <div class="row">
                <div class="top-bar-left">
                    <ul class="menu">
                        <li class="menu-text">
                            <a href="<?= Yii::$app->homeUrl ?>">My Company</a>
                        </li>
                    </ul>
                </div>
                <div class="top-bar-right">
                    <?php
                    $module = Yii::$app->controller->module ? Yii::$app->controller->module->id : null;
                    echo Nav::widget([
                        'options' => ['class' => 'menu'],
                        'items' => [
                            ['label' => 'Home', 'url' => ['default/index']],
                        ],
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </header>
</div>

<footer class="footer">
    <div class="row">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
