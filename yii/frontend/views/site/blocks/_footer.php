<footer class="footer">
    <div class="container">
        <div class="footer-block">
            <div class="logo">
                <a href="/"><img src="<?= Yii::$app->request->baseUrl?>/img/logo.svg" alt="New Life" class="logo__img"></a>
            </div>
            <ul class="links">
<!--                <li class="links__link"><a href="--><?//=\yii\helpers\Url::to(['client'])?><!--">Для клиентов</a></li>-->
                <li class="links__link"><a href="<?=\yii\helpers\Url::to(['catalog/index'])?>">Каталог</a></li>
<!--                <li class="links__link"><a href="--><?//=\yii\helpers\Url::to(['contact'])?><!--">Контакты</a></li>-->
                <li class="links__link"><a href="<?=\yii\helpers\Url::to(['about'])?>">О Нас</a></li>
            </ul>
            <ul class="tel nav__tel ">
                <li class="tel__number">
                    <a class="number" href="tel:+79787777979">+7 (978) 777-79-79</a>
                </li>
                <!-- /.tel_numbers -->
<!--                <li class="tel__number">-->
<!--                    <a class="number" href="tel:+79780743650">+7 (978) 074 36 50</a>-->
<!--                </li>-->
                <!-- /.tel_numbers -->
            </ul>
        </div>

    </div>

</footer>