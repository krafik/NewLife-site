<?php
/**
 * Created by PhpStorm.
 * User: alexe
 * Date: 13.03.2020
 * Time: 14:58
 */

namespace backend\controllers;


use backend\models\Collection;
use yii\web\Controller;

class CollectionsController extends Controller
{
    public function actionIndex()
    {
        $category = Collection::find()->all();
        return $this->render('index', ['model'=>$category]);
    }
}