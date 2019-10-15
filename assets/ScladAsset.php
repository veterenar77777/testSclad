<?php
/**
 * Created by PhpStorm.
 * User: plasmo
 * Date: 11.10.2019
 * Time: 9:47
 */


namespace app\assets;
use yii\web\AssetBundle;

class ScladAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}