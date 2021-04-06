<?

use kartik\select2\Select2;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\widgets\LinkPager;

?>

<?
$manufacturer_list = ArrayHelper::map($m_list, 'm_id', 'title');
//$category_list = ArrayHelper::map(\common\models\Category::find()->all(), 'id', 'cat_name');
//$category_list = \common\models\Category::find()->all();
$category_list = ArrayHelper::map(\common\models\Category::find()->all(), 'id', 'cat_name');

?>
<section class="section products">
    <div class="container">
        <div class="products-wrap">

            <div class="filter">

                <?php $form = ActiveForm::begin(['action' => \yii\helpers\Url::to(['catalog/index']),
                    'method' => 'get',
                    'id' => 'filter',
                    'options' => [
                        'class' => 'filter__form',

                    ],
                ]) ?>
                <div class="filter-category">
                    <h2 class="form__category">Категория</h2>
                    <?= $form->field($model, 'cat_id')->widget(Select2::classname(), [
                        'data' => $category_list,
                        'language' => 'ru',
                        'options' => ['prompt' => [
                            'text' => 'Все производители',
                            'options' => [
                                'value' => '',

                            ]],
                            'style'=>'width: 150px',

                        ],
                        'theme' => 'bootstrap',

                        'changeOnReset' => false,
                        'pluginLoading' => false,
                        'pluginOptions' => [
                            'containerCssClass' => 'some_my',
                            'dropdownCssClass' => 'Some_me',
//                        'allowClear' => true,
//                        'tags'=>true,
                            'width'=>'200px',
                        ],
                        'hideSearch' => true,
                        'pluginEvents' => [
                            "change" => "function() { let formFilter = document.querySelector('#filter'); 
                         formFilter.submit();}",

                        ]

                    ])->label(false); ?>
                </div>


<div class="filter-manufactury">
    <h2 class="form__manufactury">Производитель</h2>
    <?= $form->field($model, 'manufacturer')->widget(Select2::classname(), [
        'data' => $manufacturer_list,
        'language' => 'ru',
        'options' => ['prompt' => [
            'text' => 'Все производители',
            'options' => [
                'value' => '',

            ]],
//                            isset($_GET['manufacturer']) ? $_GET['manufacturer'] : '' => [
//                                'Selected' => true
//                            ]
        ],
        'theme' => 'bootstrap',
        'changeOnReset' => false,
        'pluginLoading' => false,
        'pluginOptions' => [
//                        'allowClear' => true,
//                        'tags'=>true,

        ],
        'hideSearch' => true,
        'pluginEvents' => [
            "change" => "function() { let formFilter = document.querySelector('#filter'); 
                         formFilter.submit();}",

        ]

    ])->label(false); ?>
</div>


                <?php ActiveForm::end() ?>
            </div>
            <!-- /.filter -->

            <div class="items">
                <? if (empty($products)) { ?>
                    <div>Ничего не найдено</div>
                <? } else { ?>
                    <?php foreach ($products as $item): ?>
                        <div class="products__item">
                            <div class="products__img">
                                <? if (empty($item->img)) {
                                } else {
                                } ?>
<!--                                <img src="../image/prod/--><?//= $item->img?><!--" alt="--><?//= $item->name ?><!--">-->
                                <img src="../image/prod/<?= $item['img']?>" alt="<?= $item['name'] ?>">
                            </div>
<!--                            <h2 class="products__name">--><?//= $item->name ?><!--</h2>-->
                            <h2 class="products__name"><?= $item['name'] ?></h2>
<!--                            <a href="--><?//= \yii\helpers\Url::to(['catalog/view', 'id' => $item->id]) ?><!--"-->
<!--                               class="products__btn">Подробнее</a>-->
                            <a href="<?= \yii\helpers\Url::to(['catalog/view', 'id' => $item['id']]) ?>"
                               class="products__btn">Подробнее</a>

                        </div>
                    <?php endforeach; ?>
                <? } ?>

            </div>

        </div>

        <!-- /.poducts-wrap -->
        <?echo LinkPager::widget([
            'pagination' => $pages,
        ]);?>
    </div>
</section>

<style>
    .pagination{
        display: flex;
        justify-content: center;
        align-items: baseline;
    }
    .pagination >  li{
        margin: 0 10px;
    }
    .pagination > li> a {
        color: black;
    }
    .pagination >.active{
        font-size: 18px;
        font-weight: 700;
    }
</style>