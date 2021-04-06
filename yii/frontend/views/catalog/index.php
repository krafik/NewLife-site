<?
/* @var $form yii\bootstrap\ActiveForm */
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

$this->params['breadcrumbs'][] = ['label' => 'САЛОН-АТЕЛЬЕ "МИЛОНГА"', 'url' => ['/site/category', 'id' => 11]];
$this->params['breadcrumbs'][] = 'Галерея';
?>
бредкрамбс
Каталог кол-во товаров
<br><br><br>

<div class="brend">
    <img src="" alt="Бренд">
    <p>text brend</p>

</div>

<div class="some">
    jghhyfn
</div>
<br><br><br>


<section class="section products">
    <div class="container">
        <div class="filter">
            <!-- <form action="" class="filter__form">
                  <div class="filter__category">
                      <p>Категория</p>
                      <select name="" id="" class="filter__items">
                          <option value="">Рыба и морепродукты</option>
                          <option value="">Молочные продукты</option>
                          <option value="">Мясные продукты</option>
                      </select>
                  </div>
                  <div class="filter__maker">
                      <p>Производитель</p>
                      <select name="" id="" class="filter__items">
                          <option value="">Молочные продукты</option>
                          <option value="">Мясные продукты</option>
                      </select>
                  </div>

              </form>-->
            <?php $form = ActiveForm::begin(['action' => \yii\helpers\Url::to(['catalog/index']),
                'method' => 'get',
                'id' => 'filter',
                'options' => [
                    'class' => 'filter__form',

                ],
                'fieldConfig' => [
                        'options' => [
                            'class' => 'filter__category'
                        ]
                ]

            ]) ?>
            <? $category_list = ArrayHelper::map(\common\models\Category::find()->all(), 'cat_name', 'cat_name') ?>
            <p>Категория</p>
            <?= $form->field($model, 'cat_name')->dropDownList($category_list,
                [
                    'prompt' =>
                        [
                            'text' => 'Все категории',
                            'options' => [
                                'value' => 'all',

                            ]
                        ],
                    'options' =>
                        [isset($_GET['cat_name']) ? $_GET['cat_name'] : '' => [
                            'Selected' => true
                        ]
                        ],
                    'id' => 'select_cat',
                    'class' => 'filter__items'

                ]
            )->label(false) ?>
            <?php ActiveForm::end() ?>


        </div>
        <div class="products-wrap">

            <? if (empty($catalog)) { ?>
                <div>Ничего не найдено</div>
            <? } else { ?>
                <?php foreach ($catalog as $item): ?>
                    <div class="products__item">
                        <div class="products__img">
                            <img src="../img/products/<?= $item->img ?>.svg" alt="мидии">

                        </div>
                        <h2 class="products__name"><?= $item->name ?> {<?= $item->id ?>} </h2>
                        <a href="<?= \yii\helpers\Url::to(['catalog/view', 'id' => $item->id]) ?>"
                           class="products__btn button__info">Подробнее</a>

                    </div>
                <?php endforeach; ?>
            <? } ?>


        </div>

    </div>
</section>

<script>
    document.body.onload = function () {
        let select_cat = document.querySelector('#select_cat');
        let formFilter = document.querySelector('#filter');
        select_cat.addEventListener('change', function () {
            formFilter.submit();
        });
    }


    //    $(document).ready(function () {
    //        $('#select_cat').change(function () {
    //            $('#filter').submit();
    //        })
    //    })
</script>