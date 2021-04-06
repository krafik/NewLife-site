<?
use yii\bootstrap\ActiveForm;

?>
<section class="section contacts">
    <div class="container">
        <h2 class="section-title section__title">Контакты</h2>
        <!-- /.section-title section__title -->
        <div class="contacts-block">
            <div class="contacts-block__form">
                <span class="contacts-block__text">Остались вопросы?</span>
                <span class="contacts-block__text">Оставте заявку и наши менеджеры вам перезвонят!</span>
                <?php $form = ActiveForm::begin([
                    'method' => 'post',
                    'fieldConfig' => [
                        'template' => "{label}\n{input}",
                    ],
                    'options' => [
                        'class' => 'form',
                        'id'=>'formContact',
                        'autocomplete'=>'off'

                    ],
                ]) ?>
                <?= $form->field($model, 'name')->textInput(['class'=>'form__input name', 'placeholder'=>'Имя *'])->label(false) ?>

                <?= $form->field($model, 'town')->textInput(['class'=>'form__input town', 'placeholder'=>'Адрес (город) *'])->label(false) ?>

                <?= $form->field($model, 'number')->input('text', ['class'=>'form__input number', 'placeholder'=>'Телефон 8(xxx)xxx-xx-xx *'])->label(false)?>

                <?= $form->field($model, 'email')->textInput(['class'=>'form__input email', 'placeholder'=>'E-mail *'])->label(false) ?>
                <div class="privacy">
                    <?= $form->field($model, 'agreement')->checkbox(['class'=>'form__privacyCheck'])->label('Я согласен с условиями обработки <a class="privacy__link" href="<?=\yii\helpers\Url::to([\'site/privacy\'])?>">персональных данных</a>'
                    )?>
<!--                    <p class="privacy__text">Я согласен с условиями обработки <a class="privacy__link" href="--><?//=\yii\helpers\Url::to(['site/privacy'])?><!--">персональных данных</a> </p>-->
                </div>

                <button type="submit" class="form__button btnForm">Отправить</button>

                <?php ActiveForm::end() ?>

            </div>
            <div class="contacts-block__info">
                <div class="adress">
                    <span class="adress__abb">Адрес:</span>
                    <span class="adress__destination">г.Симферополь, Евпаторийское шоссе 6</span>
                </div>
                <!-- /.adress -->
                <div class="tel">
                    <span class="tel__abb">Тел:</span>
                    <div class="tel-block">
                        <a class="tel__number" href="tel:+79787777979">+7 (978) 777-79-79</a>
                        <!--                        <a class="tel__number" href="tel:+79780743650">+7 (978) 074 36 50</a>-->
                    </div>
                </div>
                <!-- /.tel -->
                <div class="email">
                    <span class="email__abb">E-mail:</span>
                    <span class="email__adress">info@dknl.ru</span>

                </div>
                <!-- /.email -->
            </div>
        </div>
    </div>

    <!-- /.contact-block -->
</section>
