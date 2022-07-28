<?php
/* @var $this UserController */
/* @var $user_model User */
/* @var $comments_model Comment */
/* @var $form CActiveForm */

$this->pageTitle = 'Профиль пользователя';
?>

<h1>Профиль пользователя <?php echo $user_model->username; ?></h1>

<div class="profile">
	<?php if(!empty($user_model->image)): ?>
		<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/'.$user_model->image,"image",array("width"=>200, "class"=>"profile__image")); ?>
	<?php endif; ?>
	<div class="profile__item"><b>Имя пользователя:</b> <?php echo $user_model->username; ?></div>
	<div class="profile__item"><b>Почта:</b> <?php echo $user_model->email; ?></div>
	<div class="profile__item">
		<b>О себе:</b>
		<div><?php echo $user_model->about_user; ?></div>
	</div>
</div>

<div class="comments">
	<h2 class="comments__title">Комментарии пользователей</h2>
	<?php foreach($comments as $comment): ?>
		<div class="comments__item">
			<div class="comments__date"><?php echo CHtml::encode($comment->create_time); ?></div>
			<div class="comments__text"><?php echo CHtml::encode($comment->comment); ?></div>
		</div>
	<?php endforeach; ?>
</div>

<div class="form">
	<h2>Оставить комментарий</h2>
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'comment-form',
		'enableAjaxValidation'=>false,
		'action' => Yii::app()->createUrl("comments/create/$user_model->id")
	)); ?>
		<?php echo $form->errorSummary($comments_model); ?>
		<div class="row">
			<?php echo $form->labelEx($comments_model, 'comment'); ?>
			<?php echo $form->textarea($comments_model, 'comment', array('class' => 'form__textarea textarea')); ?>
			<?php echo $form->error($comments_model, 'comment'); ?>
		</div>
		<div class="row buttons">
			<?php echo CHtml::submitButton('Отправить', array('class' => 'button')); ?>
		</div>
	<?php $this->endWidget(); ?>
</div><!-- form -->


