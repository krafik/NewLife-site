<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "manufacturer".
 *
 * @property int $id
 * @property string $title
 * @property string $url
 * @property string $img
 * @property string $cat_name
 */
class Manufacturer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'manufacturer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'url', 'img', 'cat_name','cat_id'], 'required'],
            [['title', 'url', 'img', 'cat_name'], 'string', 'max' => 80],
            [['cat_id'],'integer']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'url' => 'Url',
            'img' => 'Img',
            'cat_name' => 'Cat Name',
            'cat_id' => 'Cat id',
        ];
    }
}
