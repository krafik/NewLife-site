<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "callrequest".
 *
 * @property int $id
 * @property string $name
 * @property string $city
 * @property string $number
 * @property string $email
 * @property string $status1
 */
class Callrequest extends \yii\db\ActiveRecord
{
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
            [['name', 'city', 'number', 'email'], 'required'],
            [['name', 'email'], 'string', 'max' => 100],
            [['city'], 'string', 'max' => 20],
            [['number'], 'string', 'max' => 12],
            [['status1'], 'string', 'max' => 25],
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
            'city' => 'City',
            'number' => 'Number',
            'email' => 'Email',
            'status1' => 'Status',
        ];
    }
}
