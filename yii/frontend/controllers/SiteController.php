<?php

namespace frontend\controllers;


use common\models\Callrequest;
use common\models\Category;
use common\models\Clients;
use common\models\Collection;
use frontend\models\Manufacturer;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\web\Response;

/**
 * Site controller
 */

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
//        Yii::$app->cache->flush();

        // META TAGS
        $this->view->title = 'Поставщик продуктов питания для ресторанов и кафе в Крыму | Новая Жизнь';
        $this->view->registerMetaTag(['name' => 'description', 'content' => 'НОВАЯ ЖИЗНЬ  - один из надежных поставщиков продуктов питания для ресторанов, кафе, столовых, баров и других предприятий питания в Крыму и Севастополе.']);
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => 'Поставщик, продукты, Крым, Ялта, Феодосия, Судак, Севастополь, Ресторан, Кафе ']);

        // Open Graph Tags
        $this->view->registerMetaTag(['property'=>'og:title', 'content'=> 'Поставщик продуктов питания для ресторанов и кафе в Крыму | Новая Жизнь']);
        $this->view->registerMetaTag(['property'=>'og:description', 'content'=> 'НОВАЯ ЖИЗНЬ  - один из надежных поставщиков продуктов питания для ресторанов, кафе, столовых, баров и других предприятий питания в Крыму и Севастополе.']);
        $this->view->registerMetaTag(['property'=>'og:image', 'content'=> Yii::getAlias('@image/image/header_bg/olive-oil_compresed.jpg')]);
        $this->view->registerMetaTag(['property'=>'og:image:width', 'content'=> '600']);
        $this->view->registerMetaTag(['property'=>'og:image:height', 'content'=> '667']);
        $this->view->registerMetaTag(['property'=>'og:url', 'content'=> Yii::$app->request->absoluteUrl]);
        $this->view->registerMetaTag(['property'=>'og:type', 'content'=>'website']);
        $this->view->registerMetaTag(['property'=>'og:site_name', 'content'=>'Новая Жизнь']);

        $this->layout = 'template-index';
        $category = Category::find()->all();
        $collection = Collection::find()->all();
        $clients = Clients::find()->all();
        $model = new Callrequest();

        if (\Yii::$app->request->isAjax) {
            if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->save()){
                /*tg*/
                $model->sendToTG($model->name, $model->town, $model->number, $model->email);
                /*End Telegram*/
                $this->layout=false;
                return $this->render('blocks/_popup',['text'=>'<p>Ваша заявка успешно отправлена</p> <p>Ожидайте звонка в ближайшее время!</p>']);
            } else{
                return $this->render('blocks/_popup',['text'=>'<p>Упс, что-то пошло не так.</p>']);
            }
        }
            return $this->render('index',
                [
                    'category' => $category,
                    'collection' => $collection,
                    'clients'=>$clients,
                    'model' => $model
                ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionFeedback()
     {
         $model = new Callrequest();
         return $this->render('form', ['model'=>$model]);
//         $model = new ContactForm();
//         if ($model->load(Yii::$app->request->post()) && $model->validate()) {
//             if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
//                 Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
//             } else {
//                 Yii::$app->session->setFlash('error', 'There was an error sending your message.');
//             }
//
//             return $this->refresh();
//         } else
//             return $this->render('index', [
//                 'model' => $model,
//             ]);
         }


    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        $this->layout = 'template-about';
        return $this->render('about');
    }

    public function actionClient()
    {
        return $this->render('forClient');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }
    public function actionPrivacy(){
        return $this->render('privacy-policy');
    }
}
