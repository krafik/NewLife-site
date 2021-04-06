<?
/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;

\frontend\assets\AboutAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?php //\yii\widgets\Pjax::begin() ?>
<div class="wrapper bg ibg">
    <img src="../img/about_bg.jpg" alt="">
    <div class="bg-gradient">
        <?= $this->render("../site/blocks/_headerAbout") ?>
        <main>
            <? \yii\widgets\Breadcrumbs::widget([
                'itemTemplate' => "<li><span>{link}</span></li>\n",
                'homeLink' => [
                    'label' => 'Главная',
                    'url' => \yii\helpers\Url::to(['site/index']),
                ],
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],

            ]) ?>
            <?= $content ?>
        </main>
    </div>
    <!-- /.bg-gradient -->


    </div>
    <!-- /.about-bg bg ibg -->


    <?= $this->render("../site/blocks/_footer") ?>

</div>
<?php //\yii\widgets\Pjax::end() ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
