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
        'bootstrap.min.css',
        'style.css',
        'animate.min.css',
        'font-awesome.min.css',
    ];
    public $js = [
        'jquery-2.1.0.min.js',
        'bootstrap.min.js',
        'blocs.min.js',
        'lazysizes.min.js',
    ];
}