<?php
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    'options' => [
        'data-pjax' => 1
    ],
]); ?>

<?= $form->field($model, 'cat_name')?>
<?php ActiveForm::end(); ?>