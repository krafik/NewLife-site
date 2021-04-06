<?php

namespace backend\models;


use Yii;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $cat_name
 * @property string $url
 * @property string|null $image
 */
class Category extends \yii\db\ActiveRecord
{
    public $file;

    public function behaviors()
    {
        return [
            'slug' => [
                'class' => 'Zelenin\yii\behaviors\Slug',
                'slugAttribute' => 'url',
                'attribute' => 'cat_name',
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
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cat_name',], 'required'],
            [['cat_name'], 'string', 'max' => 150],
            [['image'], 'string', 'max' => 100],
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
            'cat_name' => 'Cat Name',
            'url' => 'Url',
            'image' => 'Image',
            'file' => 'Image'
        ];
    }





    /*public function saveImage($fileName)
    {
        $this->image = $fileName;
        return $this->save(false);
    }

    public function getImage()
    {

        return ($this->image) ? 'upload/' . $this->image : '/no-camera.svg';
}

    public function deleteImage()
    {
        $imageUploadModel = new ImageUpload();
        $imageUploadModel->deleteCurrentImage($this->image);
    }

    public function beforeDelete()
    {
        $this->deleteImage();
        return parent::beforeDelete(); // TODO: Change the autogenerated stub
    }*/


    public function beforeSave($insert)
    {

        if ($file = UploadedFile::getInstance($this, 'file')) {

//            $dir = Yii::getAlias('@image') . '/blog/';

            if (!file_exists($this->getFolder())) {
                FileHelper::createDirectory($this->getFolder());
            }

            if (!empty($this->image) && $this->image != null && file_exists($this->getFolder() . $this->image)) {
                unlink($this->getFolder() . $this->image);
            }

            $this->image = strtotime('now') . '_' . \Yii::$app->getSecurity()->generateRandomString(6) . '.' . $file->extension;

            $file->saveAs($this->getFolder() . $this->image);

        }

        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }

    public function deleteImage()
    {

        if (file_exists($this->getFolder() . $this->image)) {
            unlink($this->getFolder() . $this->image);
        }
    }

    public function beforeDelete()
    {
        $this->deleteImage();
        return parent::beforeDelete(); // TODO: Change the autogenerated stub
    }

    public function getFolder()
    {
        return Yii::getAlias('@image') . '/catalog/';
    }


}


//<!--            <pre>-->
//<!--          --><?// var_dump($this->image);
?>
<!--    </pre>-->