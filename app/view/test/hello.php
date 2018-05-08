<?php
use jt\base\Form;
use jt\base\Html;
?>
<p>This is hello.php</p>
<p>And this is also hello.php</p>
<!--<p>--><?php //var_dump($res) ?><!--</p>-->

<?php $form = Form::begin(); ?>

<?= $form->field($model, 'a')->input()->label('aa'); ?>

<?= $form->field($model, 'b')->input()->label('b'); ?>

<?= Html::submitButton('提交') ?>

<?php Form::end(); ?>
