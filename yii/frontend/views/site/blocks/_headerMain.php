<div class="header-bg ibg">
    <!-- <img src="/assets/img/Rectangle.png" alt=""> -->
    <img src="../image/header_bg/olive-oil_compresed.jpg" alt="">
    <header class="header">
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
<!--                    <li class="nav__link"><a href="--><?//=\yii\helpers\Url::to(['client'])?><!--">Для клиентов</a> </li>-->
                    <!-- /.nav__link -->
                    <li class="nav__link"><a href="<?=\yii\helpers\Url::to(['catalog/index','FilterForm' => ['cat_name' => 'all']])?>">Каталог</a> </li>
                    <!-- /.nav__link -->
<!--                    <li class="nav__link"><a href="--><?//=\yii\helpers\Url::to(['contact'])?><!--">Контакты</a> </li>-->
                    <!-- /.nav__link -->
                    <li class="nav__link"><a href="<?=\yii\helpers\Url::to(['about'])?>">О Нас</a> </li>
                    <!-- /.nav__link -->
                </ul>
                <ul class="messengers">
                    <li class="messengers__viber">
                        <a title="Viber" href="viber://chat?number=79780973752"><img src="<?= Yii::$app->request->baseUrl?>/img/viber2.svg" alt="Viber" style="width: 20px;"></a>
                    </li>
                    <li class="messengers__whatsapp">
                        <a title="WhatsApp" href="whatsapp://send?phone=+79787777979"><img src="<?= Yii::$app->request->baseUrl?>/img/WA_logo.svg" alt="Viber" style="width: 20px;"></a>
<!--                        <a title="Viber" href="viber://add?number=79780973752"></a>-->
                    </li>
                </ul>
                <!-- /.nav__links -->
                <ul class="nav__tel tel messangers">
                    <li class="tel__number"><a class="number_h" href="tel:+79787777979">+7 (978) 777-79-79</a></li>
                    <li class="messengers__viber">
<!--                        <a class="number" href="tel:+79780743650">+7 (978) 074 36 50</a>-->

                        </li>
                </ul>
                <!-- /.nav__tel tel -->
            </div>


        </nav>
    </header> <!-- /.header -->
    <div class="hero">
        <div class="container">
            <div class="hero__wrapper">
                <h1 class="hero__title">ПОСТАВКИ ПРОДУКТОВ ПИТАНИЯ</h1>
                <span class="hero__subtitle">ДЛЯ РЕСТОРАНОВ, КАФЕ, ГОСТИНИЦ, СТОЛОВЫХ</span>

            </div>
        </div>
    </div>
    <!-- /.hero -->
</div>
<!-- /.header-bg -->
