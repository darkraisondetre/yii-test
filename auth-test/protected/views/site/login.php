<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . 'Страница входа';
?>

<h1>Вход</h1>
<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'login-form',
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
	)); ?>
		<div class="row">
			<?php echo $form->labelEx($model,'username'); ?>
			<?php echo $form->textField($model,'username', array('class' => 'form__input input')); ?>
			<?php echo $form->error($model,'username'); ?>
		</div>
		<div class="row">
			<?php echo $form->labelEx($model,'password'); ?>
			<?php echo $form->passwordField($model,'password', array('class' => 'form__input input')); ?>
			<?php echo $form->error($model,'password'); ?>
		</div>
		<div class="row checkbox">
			<?php echo $form->checkBox($model,'rememberMe', array('class' => 'checkbox__input')); ?>
			<?php echo $form->label($model,'rememberMe', array('class' => 'checkbox__checkbox-label')); ?>
			<?php echo $form->error($model,'rememberMe'); ?>
		</div>
		<div class="row buttons">
			<?php echo CHtml::submitButton('Войти', array('class' => 'button')); ?>
		</div>
	<?php $this->endWidget(); ?>
</div><!-- form -->
