<?php

namespace app\models;

class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $group;


    private static $users = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'password' => '123',
            'group'=>'admin'

        ],
         '101' => [
            'id' => '101',
            'username' => 'manager',
            'password' => '1234',
            'group'=>'manager'

        ],
        '102' => [
            'id' => '102',
            'username' => 'employee',
            'password' => '12345',
            'group'=>'employee'
        ],
    ];



    public static function getUserName($id){
        return isset(self::$users[$id])?self::$users[$id]['username']:'';
    }
    public static function findIdentity($id)
    {
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {

        return null;
    }

    public static function findByUsername($username)
    {
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }


    public function getId()
    {
        return $this->id;
    }


    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }


    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    public static function getUserListArray(){
        $result =[];
        foreach (self::$users as $user){
            $result[$user['id']]=$user['username'];
        }
        return $result;
    }
}
