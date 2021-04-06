<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string $url
 * @property string $manufacturer_id
 * @property string $cat_id
 * @property string $cat_name
 * @property string|null $img
 * @property int|null $collection
 * @property int|null $show
 * @property string|null $brend
 * @property string|null $m_country
 * @property string|null $composition
 * @property string|null $form_product
 * @property string|null $type_of_packaging
 * @property string|null $date_of_expiry
 * @property string|null $temperature
 * @property string|null $Storage_conditions
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'url', 'manufacturer_id', 'cat_id', 'cat_name'], 'required'],
            [['collection', 'show'], 'integer'],
            [['name', 'url'], 'string', 'max' => 150],
            [['manufacturer_id', 'cat_id', 'cat_name', 'img', 'brend', 'm_country', 'composition', 'form_product', 'type_of_packaging', 'date_of_expiry', 'temperature', 'Storage_conditions'], 'string', 'max' => 50],
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
            'manufacturer_id' => 'Manufacturer ID',
            'cat_id' => 'Cat ID',
            'cat_name' => 'Cat Name',
            'img' => 'Img',
            'collection' => 'Collection',
            'show' => 'Show',
            'brend' => 'Brend',
            'm_country' => 'M Country',
            'composition' => 'Composition',
            'form_product' => 'Form Product',
            'type_of_packaging' => 'Type Of Packaging',
            'date_of_expiry' => 'Date Of Expiry',
            'temperature' => 'Temperature',
            'Storage_conditions' => 'Storage Conditions',
        ];
    }
}
