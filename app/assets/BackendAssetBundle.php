<?php
/**
 * Created by PhpStorm.
 * User: witness
 * Date: 2018/5/17
 * Time: 下午8:53
 */

namespace app\assets;

use Zee\base\AssetBundle;

class BackendAssetBundle extends AssetBundle{

    public $css = [
        'backend/bootstrap.min.css',
        'backend/style.css',
        'backend/font-awesome.min.css',
    ];

    public $js = [
        'backend/jquery-2.1.0.min.js',
        'backend/bootstrap.min.js',
        'backend/blocs.min.js',
        'backend/lazysizes.min.js',
    ];
}