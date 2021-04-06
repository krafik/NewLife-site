<?php
/**
 * Created by PhpStorm.
 * User: alexe
 * Date: 07.07.2020
 * Time: 15:31
 */

namespace backend\controllers;
use common\models\Callrequest;
use yii\web\Controller;

class CallrequestController extends Controller
{
    public function actionIndex()
    {
       $req = Callrequest::find()->all();
        return $this->render('callrequest', ['req'=>$req]);
    }
}