<?php
namespace app\assets;
use yii\web\AssetBundle;



class BoostrapMediaLightboxAsset extends AssetBundle
{
    public $sourcePath = '@vendor/bootstrap-plus/bootstrap-media-lightbox';
    public $css = ['bootstrap-media-lightbox.css'];
    public $js = ['bootstrap-media-lightbox.min.js'];
    public $depends = ['yii\web\JqueryAsset'];
}
