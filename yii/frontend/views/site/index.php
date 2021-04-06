<?php
/* @var $this yii\web\View */
?>

<?= $this->render("blocks/_advantage") ?>
<?= $this->render("blocks/_catalog",['category' => $category]) ?>
<?= $this->render("blocks/_clients",['clients'=>$clients])?>
<?= $this->render("blocks/_contacts",['model'=>$model])?>


