<?php
/**
 * Created by PhpStorm.
 * User: alexe
 * Date: 03.03.2020
 * Time: 16:07
 */

/* @var $this yii\web\View */
/* @var $model backend\models\Category */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
?>

<pre>
<!--    --><?php //var_dump($model) ?>
</pre>

<?foreach ($model as $item):?>

<!--    <div>--><?//=$item?><!--</div>-->
<!--    <div>--><?//=$item['cat_name']?><!--</div>-->
<!--    <div>--><?//=$item['url']?><!--</div>-->
<!--    <div>--><?//=$item['image']?><!--</div>-->

<?endforeach;?>
<?= $model->id ?><br>
<?= $model->cat_name?><br>
<?= $model->url ?><br>
<?= $model->image ? $model->image : 'no img' ?><br>
<!--<img src="--><?//= '/catalog/'.$model->image ?><!--" alt="hi">--><?//= $model->image ?>
<img src="<?= str_replace('_admin', '', Url::home(true)) . 'image/catalog/'.$model->image?>" alt="hi"><br>

<?//= DetailView::widget([
//    'model' => $model,
//    'attributes' => [
//        'id',
//        'cat_name',
//        'url:url',
//        'image',
//    ],
//]) ?>



<p>
    <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<!--    --><?//= Html::a('Загрузить картинку', ['set-image', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
    <?= Html::a('Загрузить картинку', ['set-image', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
<!--    --><?//= Html::a('Update', ['update', 'id' => $model['id']], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => 'Are you sure you want to delete this item?',
            'method' => 'post',
        ],
    ]) ?>
</p>