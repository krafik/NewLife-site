<?php
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Категории</h2>
                <p><a class="btn btn-default" href="<?= Url::to(['category/index'])?>">Подробнее</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Каталог товаров</h2>
                <p><a class="btn btn-default" href="<?= Url::to(['products/index'])?>">Подробнее</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Производители</h2>

                <p><a class="btn btn-default" href="<?= Url::to(['manufacturer/index'])?>">Подробнее</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Коллекции</h2>

                <p><a class="btn btn-default" href="<?= Url::to(['collections/index'])?>">Подробнее</a></p>
            </div>
            <div class="col-lg-4">
                <h2>заявки</h2>

                <p><a class="btn btn-default" href="<?= Url::to(['callrequest/index'])?>">Подробнее</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Клиенты</h2>

                <p><a class="btn btn-default" href="<?= Url::to(['clients/index'])?>">Подробнее</a></p>
            </div>
        </div>

    </div>
</div>
