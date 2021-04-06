<?php
use yii\helpers\Url;
use yii\helpers\Html;
/* @var $this yii\web\View */
?>

<h1>category/index</h1>

<!--<a href="--><?//= Url::to(['category/create'])?><!--">Создать</a>-->
<?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
<? foreach ($model as $category): ?>
    <h2><?= $category->cat_name?></h2>
    <a href="<?= Url::to(['category/view', 'id' => $category->id]) ?>">Подробнее</a>
    <br>
<? endforeach; ?>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>
