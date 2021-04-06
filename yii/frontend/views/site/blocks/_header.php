<header class="header bg-color">
    <nav class="header__nav nav">
        <div class="header__logo nav__logo logo">
            <a href="/"><img class="logo__img" src="<?= Yii::$app->request->baseUrl?>/img/logo.svg"></a>
        </div>
        <div class="nav__burger icon-nav">
            <span></span>
        </div>
        <!-- /.nav__icon -->
        <div class="nav__wrap">
            <ul class="nav__list">
<!--                <li class="nav__link"><a href="--><?//=\yii\helpers\Url::to(['site/client'])?><!--">Для клиентов</a> </li>-->
                <!-- /.nav__link -->
                <li class="nav__link"><a href="<?=\yii\helpers\Url::to(['catalog/index','FilterForm' => ['cat_name' => 'all']])?>">Каталог</a></li>
<!--                'FilterForm' => ['cat_name' => 'all']-->
                <!-- /.nav__link -->
<!--                <li class="nav__link"><a href="--><?//=\yii\helpers\Url::to(['site/contact'])?><!--">Контакты</a> </li>-->
                <!-- /.nav__link -->
                <li class="nav__link"><a href="<?=\yii\helpers\Url::to(['site/about'])?>">О Нас</a> </li>
                <!-- /.nav__link -->
            </ul>
            <!-- /.nav__links -->

            <ul class="messengers">
                <li class="messengers__viber">
                    <a title="Viber" href="viber://chat?number=79787777979"><img src="<?= Yii::$app->request->baseUrl?>/img/viber2.svg" alt="Viber" style="width: 20px;"></a>
                </li>
                <li class="messengers__whatsapp">
                    <a title="WhatsApp" href="whatsapp://send?phone=+79787777979"><img src="<?= Yii::$app->request->baseUrl?>/img/WA_logo.svg" alt="Viber" style="width: 20px;"></a>
                    <!--                        <a title="Viber" href="viber://add?number=79780973752"></a>-->
                </li>
            </ul>

            <ul class="nav__tel tel">
                <li class="tel__number"><a class="number_h" href="tel:+79787777979">+7 (978) 777-79-79</a></li>
<!--                <li class="tel__number"><a class="number" href="tel:+79780743650">+7 (978) 074 36 50</a></li>-->
            </ul>
            <!-- /.nav__tel tel -->
        </div>


        <!-- </nav> -->
</header>



