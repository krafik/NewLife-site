<?
/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
\frontend\assets\AppAsset::register($this);
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
<div class="wrapper">
    <?= \common\widgets\Alert::widget(); ?>
        <?= $this->render("../site/blocks/_headerMain") ?>
    <main>
        <?= $content ?>
    </main>

    <!--    --><?//= $this->render("../site/blocks/_header") ?>

    <?= $this->render("../site/blocks/_footer")?>


<!--//    yii\bootstrap\Modal::begin([-->
<!--//        'headerOptions' => ['id' => 'modalHeader'],-->
<!--//        'id' => 'modal',-->
<!--//        'size' => 'modal-lg',-->
<!--//        //keeps from closing modal with esc key or by clicking out of the modal.-->
<!--//        // user must click cancel or X to close-->
<!--//        'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]-->
<!--//    ]);-->
<!--//-->
<!--//    yii\bootstrap\Modal::end();-->

   <div id='modalContent'></div>
</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
