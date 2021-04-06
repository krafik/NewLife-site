<?
/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;

\frontend\assets\MainAssets::register($this);
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
<div class="wrapper">
    <?= $this->render("../site/blocks/_header") ?>
    <main>
<!--        --><?//= \yii\widgets\Breadcrumbs::widget([
////            'itemTemplate' => "<li><span>{link}</span></li>",
//            'tag' => 'div',
//            'options'=>['class' => 'breadcrumbs'],
//            'homeLink' => [
//                'label' => 'Главная',
//                'url' => \yii\helpers\Url::to(['site/index']),
//            ],
////            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
//
//        ]) ?>
        <?= $content ?>
    </main>

    <?= $this->render("../site/blocks/_footer") ?>
    <div id='modalContent'></div>
</div>
<?php //\yii\widgets\Pjax::end() ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
