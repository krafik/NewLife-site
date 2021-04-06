<?
use yii\helpers\Html;
use yii\widgets\Pjax;

?>

<div class="body-content">
    <div class="row">
        <pre>
<!--            --><? //var_dump($cat_name)?>
            <!--            --><? //var_dump($catalog)?>
        </pre>
        <!--        --><?php //echo $this->render('_search', ['model' => $catalog]); ?>
        <!--        --><?php //echo $this->render('_search'); ?>
        <!--        <select name="category" id="category">-->

        <!--            <option value="all">Все катеории</option>-->
        <!--            --><? // foreach ($category as $item): ?>
        <!--                <option value="--><? //= $item['cat_name'] ?><!--" -->
        <? //// if ($_GET['cat_name'] == $item['cat_name']){echo 'selected'; } ?><!-->
        <? //= $item['cat_name'] ?><!--</option>-->
        <!--            --><? // endforeach; ?>
        <!--        </select>-->
        <!--        <select name="maker" id="maker">-->
        <!--            <option value="all">все производители</option>-->
        <!--        </select>-->
        <!--    </div>-->

        <div class="row">
            <? if (empty($catalog)) { ?>
                <div>Ничего не найдено</div>
            <? } else { ?>
                <?php foreach ($catalog as $item): ?>
                    <div class="col-lg-4">
                        <h2><?= $item['name'] ?> {<?= $item['id'] ?>} </h2>
                        <?= \yii\helpers\Html::a('Подробнее', ['catalog/index', 'cat_id' => $item['id']]) ?>
                        <a href="<?=\yii\helpers\Url::to(['catalog/view','cat_id' => $item['id']] )?>">Подробнее</a>
                    </div>

                <?php endforeach; ?>
            <? } ?>

        </div>
        <!--        --><?php //Pjax::begin(); ?>
        <!--        --><? //= \yii\widgets\ListView::widget([
        //            'dataProvider' => $dataProvider,
        //            'emptyText' => 'Ничего не найдено',
        //            'options' => [
        //                'class' => 'list'
        //            ],
        //            'itemOptions' => ['class' => 'item'],
        //            'itemView' => function ($model, $key, $index, $widget) {
        //                return Html::a(Html::encode($model->name), ['view', 'id' => $model->id]);
        //            },
        //
        //        ]) ?>
        <!--        --><?php //Pjax::end(); ?>

        <pre>
<? // var_dump($queryParams)?>
            <!--    --><? //var_dump($query)?>
            <!--    --><? // print_r($searchModel)?>
            <!--    --><? //= print_r(get_object_vars($dataProvider));?>

</pre>
        <br>
        <pre>

<!--    --><? //foreach ($dataProvider as $key=>$value){
            //        echo $value.'<br>';
            //    }?>
            <!--    --><? // print_r($dataProvider['params']);?>
            <!--    --><? //= $dataProvider['params']?>
            <!--    --><? // print_r($objArr = (array)$dataProvider->query->params);?>
            <!--    --><? // var_dump($objArr = (array)$dataProvider->query);?>
</pre>

    </div>



<!--основной фильтр-->
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

    <p>Категория</p>
    <? ?>
    <?= $form->field($model, 'cat_id')->dropDownList($category_list,
        [
            'prompt' =>
                [
                    'text' => 'Все категории',
                    'options' => [
//                                    'value' => 'all',

                    ]
                ],
            'options' =>
                [
                    isset($_GET['cat_name']) ? $_GET['cat_name'] : '' => [
                        'Selected' => true
                    ]
                ],
            'id' => 'select_cat',
            'class' => 'filter__items'

        ]
    )->label(false) ?>
    <p>Производитель</p>
    <?= $form->field($model, 'manufacturer')->dropDownList($manufacturer_list,
        [
            'prompt' => [
                'text' => 'Все производители',
                'options' => [
//                                'value' => 'all',

                ]
            ],
            'options' =>
                [
                    isset($_GET['manufacturer_id']) ? $_GET['manufacturer_id'] : '' => [
                        'Selected' => true
                    ]
                ],
            'id' => 'select_maker',
            'class' => 'filter__items'
        ])->label(false) ?>
    <?php ActiveForm::end() ?>

</div>





<!--                <div class="select-box">-->
<!---->
<!--                    <div id="category" class="options-container">-->
<!--                        <div class="option">-->
<!--                            --><? //= $form->field($model, 'cat_id')->input('radio', ['class' => 'radio', 'value' => '', 'id' => 'id_all', 'checked' => true])->label('Все категории', ['class' => 'option_label']) ?>
<!--                        </div>-->
<!---->
<!--                        --><? // foreach ($category_list as $one): ?>
<!--                            <div class="option">-->
<!---->
<!--                                --><? //= $form->field($model, 'cat_id')->input('radio', ['class' => 'radio', 'value' => $one['id'], 'id' => 'id_' . $one['id']])->label($one['cat_name'], ['class' => 'option_label']) ?>
<!--                            </div>-->
<!---->
<!--                        --><? // endforeach; ?>
<!--                    </div>-->
<!---->
<!--                    <div class="selected selected_category">-->
<!--                        --><? // if (empty($category_title)) { ?>
<!--                            Все категории-->
<!--                        --><? // } else { ?>
<!--                            --><? //= $category_title['cat_name'] ?>
<!--                        --><? // } ?>
<!--                    </div>-->
<!--                </div>-->




<!--                <div class="select-box ">-->
<!--                    <div id="manufacturer" class="options-container">-->
<!--                        <div class="option">-->
<!--                            --><? //= $form->field($model, 'manufacturer')->input('radio', ['class' => 'radio', 'value' => '', 'id' => 'id_all'])->label('Все производители', ['class' => 'option_label']) ?>
<!--                        </div>-->
<!--                        --><? // foreach ($m_list as $one): ?>
<!--                            <div class="option">-->
<!--                                --><? //= $form->field($model, 'manufacturer')->input('radio', ['class' => 'radio', 'value' => $one['m_id'], 'id' => 'm_id' . $one['m_id']])->label($one['title'], ['class' => 'option_label']) ?>
<!--                            </div>-->
<!---->
<!--                        --><? // endforeach; ?>
<!--                    </div>-->
<!--                    <div class="selected selected_manufacturer">-->
<!--                        --><? // if (empty($manufacturer_title)) { ?>
<!--                            Все производители-->
<!--                        --><? // } else { ?>
<!--                            --><? //= $manufacturer_title['title'] ?>
<!--                        --><? // } ?>
<!--                    </div>-->
<!--                </div>-->