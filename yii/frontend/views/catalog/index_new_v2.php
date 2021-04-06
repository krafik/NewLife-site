<?
use yii\widgets\Breadcrumbs;
use yii\widgets\LinkPager;
use kartik\select2\Select2;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
$manufacturer_list = ArrayHelper::map($m_list, 'm_id', 'title');
$arr = \common\models\Category::find()->all();
$category_list = ArrayHelper::map($arr, 'id', 'cat_name');
//if(empty($_GET)){
//    $cat_id = '';
//}else{$cat_id = $_GET['FilterForm']['cat_id']; }

?>
<pre>
<?//var_dump($_GET)?>
<!--    --><?//=Yii::request->getPathInfo();?>
</pre>
<?
$this->params['breadcrumbs'][] = ['label' => 'Каталог','template'=>"<span class=\"breadcrumbs__page\">{link}</span>"];
//
//echo Breadcrumbs::widget([
//    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : ['none'],
//]);
?>
<section class="products">
    <div class="container">
        <div class="products-header products__header">
            <div class="products-header__lblock">
                <?echo Breadcrumbs::widget([
                        'tag'=>'div',
                    'homeLink' => [
                        'label' => 'Главная',
                        'url' => \yii\helpers\Url::to(['site/index']),
//                        'template' => "<span class=\"breadcrumbs__mainpage\">{link}<span>",
                    ],
                    'itemTemplate' => "<span class=\"breadcrumbs__mainpage\">{link}</span> <span class=\"breadcrumbs__divider\">/</span>",

                    'options'=>['class'=>'breadcrumbs'],
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : ['none'],
                ]);?>

                <p class="products-header__title">Наш каталог</p>
                <span class="products-header__line"> </span>
                <p class="products-header__category">
                    <?=empty($_GET) || empty($_GET['FilterForm']['cat_id'])|| $_GET['FilterForm']['cat_id']=='' ? '': $category_title->cat_name;?>
                </p>
            </div>
            <div class="products-header__rblock">
                <img src="assets/img/swordfish-295149.svg" alt="">
            </div>
        </div>
        <!-- /.products__header -->

        <div class="products-wrap">

            <div class="products-wrap__header">
                <div class="products-wrap__info">
                    <p class="products-wrap__title">Категории</p>
                    <div class="products-wrap__pagination pagination">
                  <span class="pagination__text">
                    Страница:
                  </span>
                        <?

                        echo LinkPager::widget([
                            'pagination' => $pages,
                            'maxButtonCount'=>5,
                            'prevPageLabel' => false,
                            'nextPageLabel' => false,
                            'hideOnSinglePage'=>false,
                            'options' => [
                                'class' => 'pagination__pages',

                            ],
                            'linkContainerOptions' => ['class' => 'pagination__page']
                        ]); ?>

                    </div>
                </div>
            </div>

            <div class="products-items-wrap">
                <div class="filter products__filter">

                    <?php $form = ActiveForm::begin(['action' => \yii\helpers\Url::to(['catalog/index']),
                        'method' => 'get',
                        'id' => 'filter',
                        'options' => [
                            'class' => 'filter__form',

                        ],
                    ]) ?>
                    <div class="filter__category">
                        <p class="filter__categorytitle">Категории</p>
                        <?= $form->field($model, 'cat_id')->widget(Select2::classname(), [
                            'data' => $category_list,
                            'language' => 'ru',
                            'options' => ['prompt' => [
                                'text' => 'Все категории',
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

                    <div class="filter__maker">
                        <p class="filter__makertitle">Производитель</p>
                        <?= $form->field($model, 'manufacturer')->widget(Select2::classname(), [
                            'data' => $manufacturer_list,
                            'language' => 'ru',
                            'options' => ['prompt' => [
                                'text' => 'Все производители',
                                'options' => [
                                    'value' => '',

                                ]],
                            ],
                            'theme' => 'bootstrap',
                            'changeOnReset' => false,
                            'pluginLoading' => false,
                            'pluginOptions' => [

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
                <!-- /.products_filter -->
                <div class="items-wrap items">
                    <? if (empty($products)) { ?>
                        <div>Ничего не найдено</div>
                    <? } else { ?>
                        <?php foreach ($products as $item): ?>
                    <a href="<?= \yii\helpers\Url::to(['catalog/view', 'url' => $item['url']]) ?>" class="items-wrap__item">
                        <div class="items-wrap__img">
                            <img class="items__img" src="../image/prod/<?= $item['img']?>" alt=<?= $item['name'] ?>>
                        </div>
                        <h2 class="items__name"><?= $item['name'] ?></h2>

                    </a>
                        <?php endforeach; ?>
                    <? } ?>


                </div>
                <!-- /.items-wrap -->

            </div>

            <div class="products-wrap__footer">
                <div class="products-wrap__pagination pagination">
                <span class="pagination__text">
                  Страница:
                </span>
                    <?

                    echo LinkPager::widget([
                        'pagination' => $pages,
                        'maxButtonCount'=>5,
                        'prevPageLabel' => false,
                        'nextPageLabel' => false,
                        'hideOnSinglePage'=>false,
                        'options' => [
                            'class' => 'pagination__pages',

                        ],
                        'linkContainerOptions' => ['class' => 'pagination__page']
                    ]); ?>
                </div>
            </div>

        </div>
    </div>

</section>