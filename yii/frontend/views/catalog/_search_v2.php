<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">
<? var_dump($_GET)?>
<!--    --><?//foreach ($_GET as $item=>$key):?>
<!--        <div>-->
<!--        --><?//= $item['key']?>
<!--        </div>-->
<!--    --><?//endforeach;?>

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?$list = ArrayHelper::map(\common\models\Category::find()->all(),'cat_name', 'cat_name')?>
<!--    --><?//= $form->field($model, 'cat_name')
//        ->dropDownList($list,
//        [
//            'prompt'=>'Все категории',
//            'options'=>
//                [$_GET['cat_name']=>[
//                    'Selected'=>true
//                ]]
//
//        ])?><!--  -->
<!--    --><?//= $form->field($model, 'cat_name')?>
<!--    --><?//= $form->field($model, 'id', []) ?>

<!--    --><?//= $form->field($model, 'name') ?>

<!--    --><?//= $form->field($model, 'img') ?>

<!--    --><?//= $form->field($model, 'url') ?>

<!--    --><?//= $form->field($model, 'maker') ?>

    <?php // echo $form->field($model, 'cat_id') ?>



    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
