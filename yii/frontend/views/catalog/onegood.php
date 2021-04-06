<?
use yii\bootstrap\ActiveForm;
?>

<section class="section onegood">
    <div class="container">
        <div class="goodwrap">
            <div class="imgwrap">
                <div class="onegood__img">
                    <img src="<?= Yii::$app->request->baseUrl?>/image/prod/<?=$onegood->img?>" alt="<?=$onegood->name?>">
                </div>

            </div>
            <div class="onegood__description">
                <h2 class="onegood__name"><?=$onegood->name?></h2>
                <p class="onegood__info"></p>
                <p class="onegood__text">
                    Заказать этот и другие товары можно по телефону
                </p>
                <p class="onegood__number">
                    <a
                            class="onegood__number" href="tel:+79780888583"> +7 (978) 088 85 83</a>
                </p>
                <p class="onegood__callrequest">или закажите звонок и мы
                    вам перезвоним</p>


                <?php $form = ActiveForm::begin([
                    'method' => 'post',
                    'fieldConfig' => [
                        'template' => "{label}\n{input}",
                    ],

                    'options' => [
                        'class' => 'onegood__callback',
                        'id'=>'formContact',
                        'autocomplete'=>'off'

                    ],
                ]) ?>

                <?= $form->field($model, 'name')->textInput(['class'=>'onegood__input form__input name', 'placeholder'=>'Имя *'])->label(false) ?>

                <?= $form->field($model, 'town')->textInput(['class'=>'onegood__input form__input town', 'placeholder'=>'Адрес (город) *'])->label(false) ?>

                <?= $form->field($model, 'number')->input('tel', ['class'=>'onegood__input form__input number', 'placeholder'=>'Телефон *'])->label(false)?>

                <?= $form->field($model, 'email')->textInput(['class'=>'onegood__input form__input email', 'placeholder'=>'E-mail *'])->label(false) ?>
                <div class="privacy">
                    <?= $form->field($model, 'agreement')->checkbox(['class'=>'form__privacyCheck'])->label(false
                    )?>
                    <p class="privacy__text">Я согласен с условиями обработки <a class="privacy__link" href="<?=\yii\helpers\Url::to(['site/privacy'])?>">персональных данных</a> </p>
                </div>

                <button type="submit" class="onegood__btnSubm form__button btnForm">Отправить</button>

                <?php ActiveForm::end() ?>


            </div>
        </div>
    </div>




</section>

<?=$this->render('../site/blocks/_partners', ['partners'=>$partners])?>