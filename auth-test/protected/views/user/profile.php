<?php
/* @var $this SiteController */
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */

$this->pageTitle = 'Ваш профиль';
?>

<h1>Профиль пользователя</h1>

<div class="profile">
	<?php if(!empty($model->image)): ?>
		<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/'.$model->image,"image",array("width"=>200, "class"=>"profile__image")); ?>
	<?php endif; ?>
	<div class="profile__item"><b>Имя пользователя:</b> <?php echo $model->username; ?></div>
	<div class="profile__item"><b>Почта:</b> <?php echo $model->email; ?></div>
	<div class="profile__item">
		<b>О себе:</b>
		<div><?php echo $model->about_user; ?></div>
	</div>
</div>

<div class="form">
<hr>
<br>
<h2>Редактировать данные пользователя</h2>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
	'action'=>Yii::app()->createUrl('/user/update'),
	'htmlOptions' => array(
		'enctype' => 'multipart/form-data',
	)
)); ?>
	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>128, 'class' => 'form__input input')); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128, 'class' => 'form__input input')); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'about_user'); ?>
		<?php echo $form->textarea($model,'about_user', array('class' => 'form__textarea textarea')); ?>
		<?php echo $form->error($model,'about_user'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'image', array('class' => 'button', 'label'=>'Изменить картинку')); ?>
		<?php echo CHtml::activeFileField($model, 'image', array('class' => 'hidden')); ?>
		<?php echo $form->error($model,'image'); ?>
	<div class="row">
	<div class="row buttons">
		<?php echo CHtml::submitButton('Сохранить', array('class' => 'button')); ?>
	</div>
<?php $this->endWidget(); ?>


</div><!-- form -->
