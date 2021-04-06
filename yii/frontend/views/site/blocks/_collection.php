<section class="section сollection">
    <div class="container">
        <h2 class="section-title section__title">Подборки</h2>
        <!-- /.section-title section__title -->
        <div class="сollection-block">
            <div class="сollection-block__item">
                <h3 class="сollection-block__name">Продукты для японской кухни</h3>
                <!-- /.collection-block__name -->
                <img src="../image/collections/japan-food.png" alt="" class="collection-block__image">
            </div>
            <!-- /.collection-block__item -->
            <div class="сollection-block__item">
                <h3 class="сollection-block__name">Продукты для фаст-фуда</h3>
                <!-- /.collection-block__name -->
                <img src="../image/collections/fast-food.png" alt="" class="collection-block__image">
            </div>
            <!-- /.collection-block__item -->
            <div class="сollection-block__item">
                <h3 class="сollection-block__name">Продуктыдля европейской кухни</h3>
                <!-- /.collection-block__name -->
                <img src="../image/collections/europian-food.png" alt="" class="collection-block__image">
            </div>
            <? foreach ($collection as $item): ?>

                <div class="сollection-block__item">
<!--                    <a href="--><?//=\yii\helpers\Url::to()?><!--"></a>-->
                    <h3 class="сollection-block__name"><?=$item['name']?></h3>
                    <!-- /.collection-block__name -->
                    <img src="../image/collections/europian-food.png" alt="" class="collection-block__image">
                </div>

            <? endforeach; ?>
            <!-- /.collection-block__item -->
        </div>
        <!-- /.collection-block -->
    </div>
    <!-- /.container -->
</section>