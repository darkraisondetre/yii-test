<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = 'Страница регистрации';
?>

<div class="register">
	<h1>Регистрация</h1>
	<div class="form">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'register-form',
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
				<?php echo $form->labelEx($model,'email'); ?>
				<?php echo $form->emailField($model,'email', array('class' => 'form__input input')); ?>
				<?php echo $form->error($model,'email'); ?>
			</div>
			<div class="row">
				<?php echo $form->labelEx($model,'password'); ?>
				<?php echo $form->passwordField($model,'password', array('class' => 'form__input input')); ?>
				<?php echo $form->error($model,'password'); ?>
			</div>
			<div class="row">
				<?php echo $form->labelEx($model,'retypepassword'); ?>
				<?php echo $form->passwordField($model,'retypepassword', array('class' => 'form__input input')); ?>
				<?php echo $form->error($model,'retypepassword'); ?>
			</div>
			<div class="row">
				<?php echo CHtml::submitButton('Зарегистрироваться', array('class' => 'button')); ?>
			</div>
		<?php $this->endWidget(); ?>
	</div><!-- form -->
</div>

