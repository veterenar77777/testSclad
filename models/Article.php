<?php
/**
 * Created by PhpStorm.
 * User: plasmo
 * Date: 14.10.2019
 * Time: 16:39
 */

namespace app\models;


use yii\db\ActiveRecord;

class Article extends ActiveRecord
{
    public static function tableName()
    {
        return 'article';
    }
    public function rules()
    {
      return [
           [['name'], 'required'],
           [['name'], 'string','max' => 255],
           [['name'], 'unique', 'message' => 'Артикул {value} существует.' ],
        ];
    }
    public function attributeLabels()
    {
        return [
            'name'=>'Наименование'
      ];
    }
}