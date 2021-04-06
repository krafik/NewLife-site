<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ManufacturerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Manufacturers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manufacturer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Manufacturer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<div class="man_row">
    <? foreach ($model as $category): ?>
        <div class="man_item">
            <h2><?= $category->title?></h2>
            <a href="<?= Url::to(['manufacturer/view', 'id' => $category->id]) ?>">Подробнее</a>

        </div>
        <br>
    <? endforeach; ?>
</div>



    <?php Pjax::begin(); ?>
<!--    --><?php //echo $this->render('_search', ['model' => $searchModel]); ?>

<!--    --><?// ListView::widget([
//        'dataProvider' => $dataProvider,
//        'itemOptions' => ['class' => 'item'],
//        'itemView' => function ($model, $key, $index, $widget) {
//            return Html::a(Html::encode($model->title), ['view', 'id' => $model->id]);
//        },
//    ]) ?>

    <?php Pjax::end(); ?>

</div>
