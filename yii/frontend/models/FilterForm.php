<?php
/**
 * Created by PhpStorm.
 * User: alexe
 * Date: 08.03.2020
 * Time: 23:12
 */

namespace frontend\models;

use yii\base\Model;

class FilterForm extends Model
{
    public $cat_name;
    public $cat_id;
    public $manufacturer;

    public function rules()
    {
        return [
            [['cat_name','manufacturer', 'cat_id'], 'string'],
        ];
    }
}