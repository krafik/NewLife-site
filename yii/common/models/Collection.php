<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "collection".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $url
 * @property string|null $img
 */
class Collection extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'collection';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'url'], 'string', 'max' => 150],
            [['img'], 'string', 'max' => 50],
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
            'url' => 'Url',
            'img' => 'Img',
        ];
    }
}
