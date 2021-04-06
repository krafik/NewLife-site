<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ProductSearchFront */
/* @var $form ActiveForm */
?>
<div class="form">
    <!--    --><? // echo $cat_name ?>
    <?php $form = ActiveForm::begin([
        'action' => ['catalog/index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],

    ]); ?>

    <? $model->cat_name = $cat_name ?>
    <!--        --><? //= $form->field($model, 'id') ?>
    <!--        --><? //= $form->field($model, 'cat_id') ?>
    <!--        --><? //= $form->field($model, 'name') ?>
    <!--        --><? //= $form->field($model, 'img') ?>
    <!--        --><? //= $form->field($model, 'url') ?>
    <!--        --><? //= $form->field($model, 'maker') ?>
    <?= $form->field($model, 'cat_name')->hiddenInput()->label(false) ?>

<!--    <pre>-->
<!--       --><? //=var_dump($model['cat_name'])?>
<!--    </pre>-->

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- _form -->
