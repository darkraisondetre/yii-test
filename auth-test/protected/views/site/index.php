<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<div class="welcome-page">
  <div class="welcome-page__content">
    <h1 class="welcome-page__title">Добро пожаловать в <?php echo CHtml::encode(Yii::app()->name); ?></h1>
    <div class="welcome-page__text">Тестовое задание по созданию функционала регистрации и авторизации пользователей на сайте</div>
    <?php if(!Yii::app()->user->isGuest): ?>
    <div class="welcome-page__buttons">
      <?php echo CHtml::link('Профиль', array('/user/profile'), array('class' => 'welcome-page__link button')); ?>
      <?php echo CHtml::link('Пользователи', array('/user'), array('class' => 'welcome-page__link button')); ?>
    </div>
    <?php endif; ?>
  </div>
  <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/welcome-image.png', "image" ,array("class"=>"welcome-page__image")); ?>
</div>
