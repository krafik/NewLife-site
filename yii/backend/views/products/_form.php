<?php

use kartik\file\FileInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">




    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
<div class="col-md-6">
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file')->widget(FileInput::classname(), [
        'pluginOptions' => [
            'showCaption' => false,
            'showRemove' => false,
            'showUpload' => false,
            'browseClass' => 'btn btn-primary btn-block',
            'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
            'browseLabel' => 'Select Photo'
        ],
        'options' => ['accept' => 'image/*']
    ]); ?>
</div>
    <? $manufacturer_list = ArrayHelper::map(\frontend\models\Manufacturer::find()->orderBy('title')->all(), 'id', 'title');
    $category_list = ArrayHelper::map(\common\models\Category::find()->orderBy('cat_name')->all(), 'id', 'cat_name');
    ?>

    <div class="col-md-6">
        <?= $form->field($model, 'manufacturer_id')->dropDownList($manufacturer_list, [
            'prompt' =>
                [
                    'text' => 'Выберите производителя',
                    'options' => [
                        'value' => null,

                    ]
                ],
        ]) ?>

        <?= $form->field($model, 'cat_id')->dropDownList($category_list, [
            'prompt' =>
                [
                    'text' => 'Выберите производителя',
                    'options' => [
                        'value' => null,

                    ]
                ],
        ]) ?>
        <?= $form->field($model, 'collection')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'show')->textInput(['maxlength' => true]) ?>
    </div>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
