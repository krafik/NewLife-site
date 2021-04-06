<?php

namespace common\models;

use frontend\models\Manufacturer;
use Yii;

/**
 * This is the model class for table "cat_manuf".
 *
 * @property int $id
 * @property int $cat_id
 * @property int $manuf_id
 */
class CatManuf extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_manuf';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cat_id', 'manuf_id'], 'required'],
            [['cat_id', 'manuf_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cat_id' => 'Cat ID',
            'manuf_id' => 'Manuf ID',
        ];
    }

    public function getTag(){
        return $this->hasOne(Category::className(),['id'=>'cat_id']);
    }


}
