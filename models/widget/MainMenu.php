<?php
/**
 * Created by PhpStorm.
 * User: plasmo
 * Date: 14.10.2019
 * Time: 17:30
 */
namespace app\models\widget;
class MainMenu
{

    public static function  getItems(){
        $result =[];
        if(\Yii::$app->user->can('AddArticle')){
            $result[]= ['label' => 'Добавить артикул', 'url' => ['/site/add-article']];
        }

        if(\Yii::$app->user->can('AddDebit')){
            $result[]= ['label' => 'Приход', 'url' => ['/site/debit']];
        }
        if(\Yii::$app->user->can('AddCredit')){
            $result[]= ['label' => 'Расход', 'url' => ['/site/credit']];
        }
        if(\Yii::$app->user->can('ViewHistory')){
            $result[]= ['label' => 'История операций', 'url' => ['/site/history']];
        }

        $result[]=  \Yii::$app->user->isGuest ? ( ['label' => 'Login', 'url' => ['/site/login']])
            : ( ['label' => 'Logout', 'url' => ['/site/logout'],['class' => 'btn btn-link ']] );

        return $result;
    }
}