<?php
/**
 * Created by PhpStorm.
 * User: alexe
 * Date: 10.03.2020
 * Time: 16:45
 */

namespace frontend\models;


use yii\base\Model;
use Yii;

class FeedbackForm extends Model
{


    public $name;
    public $email;
    public $number;

    public function rules()
    {
        return [
            // name, email, subject and body are required
//            [['name', 'email', 'subject', 'body'], 'required'],
            [['name', 'email', 'number'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
//            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    /*  public function attributeLabels()
      {
          return [
              'verifyCode' => 'Verification Code',
          ];
      }*/

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    public function sendEmail($email)
    {
        return Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
            ->setReplyTo([$this->email => $this->name])
//            ->setSubject($this->subject)
//            ->setTextBody($this->body)
            ->send();
    }

}