<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Manufacturer */

$this->title = 'Update Manufacturer: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Manufacturers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="manufacturer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    <div class="well">
        <?php foreach ($model->category as $one): ?>
            <?=$one->cat_name ?><br>
        <?php endforeach; ?>
    </div>
<pre>
    <?= var_dump(ArrayHelper::map($model->category,'id','cat_name'));?>
</pre>
</div>
