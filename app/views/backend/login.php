<?php
/**
 * Created by PhpStorm.
 * User: witness
 * Date: 2018/5/17
 * Time: 下午8:37
 */
use Zee\base\Form;
use Zee\base\Html;
?>

<?php $form = Form::begin() ?>

<?= $form->field()->input() ?>

<?= $form->field()->input() ?>

<?= Html::submitButton('登录') ?>

<?php Form::end() ?>
