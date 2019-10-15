<?php
/**
 * Created by PhpStorm.
 * User: plasmo
 * Date: 14.10.2019
 * Time: 11:17
 */

namespace app\rbac;


use yii\rbac\Rule;

class UserGroupRule extends Rule
{
    public $name = 'userGroup';
    public function execute($user, $item, $params)
    {

        if (!\Yii::$app->user->isGuest) {
            $group = \Yii::$app->user->identity->group;

            switch ($item->name){
                case 'manager':
                    return $group == 'manager';
                    break;
                case 'admin':
                    return $group == 'admin';
                    break;
                case 'employee':
                    return $group == 'employee';
                    break;
            }

        }
        return false;
    }
}