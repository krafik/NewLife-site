<?php

namespace backend\controllers;

use backend\models\ImageUpload;
use yii\base\DynamicModel;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use backend\models\Category;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

class CategoryController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }


    public function actionIndex()
    {
        $category = Category::find()->all();
        return $this->render('index', ['model' => $category]);
    }

    public function actionView($id)
    {
//        $model = Category::find()->where(['id'=>$id])->one();
//        return $this->render('view', [
//            'model' => $model,
//        ]);

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Category();

        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionSetImage($id)
    {
        $model = new ImageUpload;

        if (\Yii::$app->request->isPost) {

            $category = $this->findModel($id);
            $file = UploadedFile::getInstance($model, 'image');

            if ($category->saveImage($model->uploadFile($file, $category->image))) {
                return $this->redirect(['view', 'id' => $category->id]);
            };

        }
        return $this->render('image', ['model' => $model]);
    }


   /* public function actionSetImageImg($sub = 'main') //загрузка картинки из редактора

    {
        if (\Yii::$app->request->isPost) {
            $dir = \Yii::getAlias('@image') . '/' . $sub . '/';
            $result_link = str_replace('admin.', '', Url::home(true)) . 'image/' . $sub . '/';
            $file = UploadedFile::getInstanceByName($this->uploadParam);
            $model = new DynamicModel(compact('file'));
            $model->addRule('file', 'image')->validate();
            if ($model->hasErrors()) {
                $result = [
                    'error' => $model->getFirstError('file')
                ];
            } else {
                $model->file->name = strtotime('now') . '_' . \Yii::$app->getSecurity()->generateRandomString(6) . '.' . $model->file->extension;
            }

        }
    }*/
}
