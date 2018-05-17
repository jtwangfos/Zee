<?php
/**
 * Created by PhpStorm.
 * User: witness
 * Date: 2018/5/17
 * Time: 下午12:00
 */

namespace Zee\base;


class AssetBundle {

    public $css = [];
    public $cssPath = '/public/css/';
    public $js = [];
    public $jsPath = '/public/js/';

    public function load() {
        foreach ($this->css as $c) {
            $css[] = "<link rel='stylesheet' type='text/css' href=" . $this->cssPath . $c . ">";
        }
        foreach ($this->js as $j) {
            $js[] = "<script src='" . $this->jsPath . $j . "'></script>";
        }
        return [
            'css' => $css,
            'js' => $js,
        ];
    }
}