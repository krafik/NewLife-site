<?php
use \yii\helpers\Url;

?>

<section class="section catalog">
    <div class="container">
        <h2 class="section-title section__title">Каталог</h2>

        <div class="catalog-block">

            <?php foreach ($category as $cat): ?>
                <div class="catalog-item catalog-block__item">

                    <a href="<?= Url::to(['/catalog/index', 'FilterForm'=>['cat_id' => $cat->id]]) ?>">
                        <h2 class="catalog-item__name"><?= $cat->cat_name ?></h2>
                        <img src="../image/catalog/<?= $cat->image ?>" alt="" class="catalog-item__img">
                    </a>
                </div>
            <? endforeach; ?>


        </div>
        <!-- /.catalog-block -->
        <div class="button catalog__button">
<!--            <a href="--><?//= Url::to(['/catalog/index', 'ProductSearchForm' => '']) ?><!--" class="button__catalog">Перейти в-->
<!--                каталог</a>-->
<!--            <a href="--><?//= Url::to(['/catalog/index', 'cat_name'=>'all']) ?><!--" class="button__catalog">Перейти в-->
<!--                каталог</a>-->
            <a href="<?= Url::to(['/catalog/index', 'FilterForm' => ['cat_name' => 'all']]) ?>" class="button__catalog">Перейти в
                каталог</a>
        </div>
    </div>
    <!-- /.container -->

</section>