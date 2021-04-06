<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Manufacturer */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Manufacturers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="manufacturer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?= $model->id ?><br>
<!--    --><?//= $model->cat_name ?><!--<br>-->
    <?= $model->url ?><br>
    <?= $model->img ? $model->img : 'no img' ?><br>
    <img src="<?= str_replace('_admin', '', Url::home(true)) . 'image/manufacturers/' . $model->img ?>" alt="hi"><br>

    <?php foreach ($model->category as $one): ?>
            <?=$one->cat_name ?><br>
    <?php endforeach; ?>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'url:url',
            'img',
//            'cat_name',
        ],
    ]) ?>

</div>
