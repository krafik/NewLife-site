<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "callrequest".
 *
 * @property int $id
 * @property string $name
 * @property string $town
 * @property string $number
 * @property string $email
 * @property string $status
 * @property string $agreement
 */
class Callrequest extends \yii\db\ActiveRecord
{
    public $message = "";
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'callrequest';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'town', 'number', 'email','agreement'], 'required'],
            [['name', 'email'], 'string', 'max' => 100],
            [['town'], 'string', 'max' => 20],
            [['number'], 'string', 'min'=>11,'max' => 11],
            [['status'], 'string', 'max' => 25],
            [['agreement'], 'compare', 'compareValue' => 1,'message'=>'Мы не можем принять заявку без согласия на обработку ваших данных']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'town' => 'Town',
            'number' => 'Number',
            'email' => 'Email',
            'status' => 'Status',
            'agreement'=>'согласие'
        ];
    }

    public function sendToTG($name, $town, $number, $email){
        $token= "1174498167:AAEsbCmyUS7rNA3eiMNhtFWqnkigQA52czQ";
        $chat_id ="-403183247";
        $arr=array(
            'Имя: '=> $name,
            'Город: '=>$town,
            'Телефон: '=>urlencode($number),
            'E-mail: '=>$email
        );
        foreach ($arr as $key => $value){
            $this->message .= "<b>".$key."</b>".$value."%0A";
        }
        return fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text=$this->message","r");

    }
}
