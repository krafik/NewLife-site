<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */


$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="container">
        <div class="row">
    <? foreach ($model as $product): ?>
        <div class="col-md-4 item">
            <p style="<?if($product->show == 0){?>color:red;<?}?>"> <?= $product->name ?>
            </p>
            <div class="img" style="">
<!--                <img src="../image/prod/--><?//= $product->img ?><!--" alt="" >-->
                <img src="<?= str_replace('_admin', '', Url::home(true)) . 'image/prod/' . $product->img?>" alt="" style="height: 160px;
    object-fit: contain; width: 100%;">
            </div>
            
            <a href="<?= Url::to(['products/view', 'id' => $product->id]) ?>">Подробнее</a>
            <br>
            <br>
            <br>
        </div>

    <? endforeach; ?>
        </div>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


</div>
<style>
    .item{
        margin: 0 20px 10px 20px;
        max-width: 300px;
        height: 250px;
        border:1px solid #000;
    }
</style>