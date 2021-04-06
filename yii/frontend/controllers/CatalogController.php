<?php
/**
 * Created by PhpStorm.
 * User: alexe
 * Date: 03.03.2020
 * Time: 23:10
 */

namespace frontend\controllers;

use common\models\Callrequest;
use common\models\Category;
use common\models\Product;
use frontend\models\FilterForm;
use frontend\models\Manufacturer;
use Yii;
use yii\data\Pagination;
use yii\db\Query;
use yii\web\Controller;

class CatalogController extends Controller
{

    public function actionIndex()
    {
        $this->view->title = 'Каталог';
        $model = new FilterForm();
        $products = new Product();
        if (empty(\Yii::$app->request->get())) {
//            die('done');
            //если гет запрос пуст(при переходе в каталог), выводим все продукты.
//            $products = Product::find()->where(['show'=>1])->all();
            $products = Product::find()->where(['show'=>1]);
            $countProducts = clone $products;
            $pages = new Pagination(['totalCount'=>$countProducts->count()]);
            $prodModel = $products->offset($pages->offset)->limit($pages->limit)->all();
            $pages->pageSizeParam = false;
            $pages->forcePageParam = false;




            $query = new Query();
            $query->select(['m.id AS m_id', 'm.title',])->from('manufacturer m')->all();

            $mList = $query->createCommand()->queryAll();

        } else if ($model->load(\Yii::$app->request->get()) ) {

            //если загрузилась с моделью
//            $filterParams = [];
            /*if ($model->manufacturer != ''){
                $filterParams['manufacturer_id'] = $model->manufacturer;
            }
            if($model->cat_id){
                $filterParams['cat_id'] = $model->cat_id;
            }*/
            $products = Product::find()->filterWhere(['cat_id' => $model->cat_id, 'manufacturer_id' => $model->manufacturer])->andWhere(['show'=>1]);
//            $products = Product::find()->filterWhere($filterParams)->andWhere(['show'=>1]);
            $countProducts = clone $products;
            $pages = new Pagination(['totalCount'=>$countProducts->count()]);
            $prodModel = $products->offset($pages->offset)->limit($pages->limit)->all();
            $pages->pageSizeParam = false;
            $pages->forcePageParam = false;






            $query = new Query();
            if(empty($_GET['FilterForm']['cat_id'])){
                $query->select(
                    ['m.id AS m_id',
                        'c.id as c_id',
                        'm.title',
                        'c.manuf_id',
                        'c.cat_id'])
                    ->from('manufacturer m')->join('LEFT JOIN', 'cat_manuf c', 'm.id = c.manuf_id')->all();
            } else {
                $query->select(
                    ['m.id AS m_id',
                        'c.id as c_id',
                        'm.title',
                        'c.manuf_id',
                        'c.cat_id'])
                    ->from('manufacturer m')->join('LEFT JOIN', 'cat_manuf c', 'm.id = c.manuf_id')->where('c.cat_id=:id', [':id' => $_GET['FilterForm']['cat_id']])->all();
            }
            $r = $query->createCommand();
            $mList = $r->queryAll();
        }

        $manufacturer_title = Manufacturer::findOne(['id'=>$model->manufacturer]);
        $category_title = Category::findOne(['id'=>$model->cat_id]);
        return $this->render('index_new_v2', [
            'model' => $model,
            'manufacturer_title' => $manufacturer_title,
//            'products' => $products,
            'products' => $prodModel,
            'm_list' => $mList,
            'category_title'=>$category_title,
                        'pages'=>$pages,
        ]);
    }


    public function actionView($url)
    {

        $onegood = Product::find()->where(['url'=>$url])->one();
        $partners = Manufacturer::find()->all();
        $model = new Callrequest();
        if (\Yii::$app->request->isAjax) {
            if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->save()){
                /*tg*/
                $token= "1174498167:AAEsbCmyUS7rNA3eiMNhtFWqnkigQA52czQ";
                $chat_id ="-403183247";
                $arr=array(
                    'Имя: '=> $model->name,
                    'Город: '=>$model->town,
                    'Телефон: '=>urlencode($model->number),
                    'E-mail: '=>$model->email
                );
                foreach ($arr as $key => $value){
                    $this->message .= "<b>".$key."</b>".$value."%0A";
                }
                $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text=$this->message","r");
                /*End Telegram*/
                $this->layout=false;
                return $this->render('blocks/_popup',['text'=>$model->name]);
            } else{
                return 'fail';
            }
        }


        return $this->render('onegood',['onegood'=>$onegood, 'model'=>$model, 'partners'=>$partners]);
    }

}

