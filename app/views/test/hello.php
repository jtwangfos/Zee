<?php
use Zee\base\Form;
use Zee\base\Html;

?>
<p>This is hello.php</p>
<p>And this is also hello.php</p>

<?php $form = Form::begin(); ?>

<?= $form->field($model, 'a')->input()->label('aa'); ?>

<?= $form->field($model, 'b')->input()->label('b'); ?>

<?= Html::submitButton('提交') ?>

<?php Form::end(); ?>
