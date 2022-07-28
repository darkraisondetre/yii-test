<?php
/* @var $this UserController */
/* @var $data User */
/* @var $form CActiveForm */
?>

<div class="users__user user">
	<div class="user__item">
		<span class="user__title"><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</span>
		<?php echo CHtml::encode($data->username); ?>
	</div>
	<div class="user__item">
		<span class="user__title"><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</span>
		<?php echo CHtml::encode($data->email); ?>
	</div>
	<div class="user__item">
		<span class="user__title"><?php echo CHtml::encode($data->getAttributeLabel('about_user')); ?>:</span>
		<?php echo CHtml::encode($data->about_user); ?>
	</div>
	<div class="user__item">
		<?php echo CHtml::link('Перейти в профиль', array('view', 'id' => $data->id)); ?>
	</div>
</div>