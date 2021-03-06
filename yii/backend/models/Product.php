<?php

namespace backend\models;

use Yii;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string $img
 * @property string $url
 * @property string $manufacturer_id
 * @property int $cat_id
 * @property string $cat_name
 * @property string $collection
 * @property string $show
 */
class Product extends \yii\db\ActiveRecord
{
    public $file;

    public function behaviors()
    {
        return [
            'slug' => [
                'class' => 'Zelenin\yii\behaviors\Slug',
                'slugAttribute' => 'url',
                'attribute' => 'name',
                // optional params
                'ensureUnique' => true,
                'replacement' => '-',
                'lowercase' => true,
                'immutable' => false,
                // If intl extension is enabled, see http://userguide.icu-project.org/transforms/general.
                'transliterateOptions' => 'Russian-Latin/BGN; Any-Latin; Latin-ASCII; NFD; [:Nonspacing Mark:] Remove; NFC;'
            ]
        ];
    }

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
//            [['name', 'img', 'url', 'maker', 'cat_id', 'cat_name'], 'required'],
            [['name', 'show'], 'required'],
            [['cat_id','show'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['img', 'url'], 'string', 'max' => 150],
            [['manufacturer_id', 'cat_name'], 'string', 'max' => 50],
            [['file'], 'image']
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
            'img' => 'Img',
            'url' => 'Url',
            'manufacturer_id' => 'Maker',
            'cat_id' => 'Cat ID',
            'cat_name' => 'Cat Name',
            'file' => 'Image',
            'collection'=>'??????????????????',
            'show'=>'????????????????????????'
        ];
    }


    public function beforeSave($insert)
    {

        if ($file = UploadedFile::getInstance($this, 'file')) {

            if (!file_exists($this->getFolder())) {
                FileHelper::createDirectory($this->getFolder());
            }
            if (!empty($this->img) && $this->img != null && file_exists($this->getFolder() . $this->img)) {
                unlink($this->getFolder() . $this->img);
            }
            $this->img = strtotime('now') . '_' . \Yii::$app->getSecurity()->generateRandomString(6) . '.' . $file->extension;
            $file->saveAs($this->getFolder() . $this->img);

        }

        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }

     public function deleteImage()
      {
          if (file_exists($this->getFolder() . $this->img)) {
              unlink($this->getFolder() . $this->img);
          }
      }

      public function beforeDelete()
      {
          $this->deleteImage();
          return parent::beforeDelete(); // TODO: Change the autogenerated stub
      }

    public function getFolder()
    {
        return Yii::getAlias('@image') . '/prod/';
    }


}
