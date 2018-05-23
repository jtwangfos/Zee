<?php
namespace app\assets;
/**
 * Created by PhpStorm.
 * User: witness
 * Date: 2018/5/17
 * Time: 下午1:54
 */
use Zee\base\AssetBundle;

class FrontendAssetBundle extends AssetBundle {

    public $css = [
        'frontend/bootstrap.min.css',
        'frontend/style.css',
        'frontend/animate.min.css',
        'frontend/font-awesome.min.css',
    ];
    public $js = [
        'frontend/jquery-2.1.0.min.js',
        'frontend/bootstrap.min.js',
        'frontend/blocs.min.js',
        'frontend/lazysizes.min.js',
    ];
}