<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
	<div class="container" id="page">
		<header class="header">
			<?php if(!Yii::app()->user->isGuest): ?>
				<div class="header__logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
			<?php endif; ?>
			<nav class="header__navigation">
				<?php $this->widget('zii.widgets.CMenu',array(
					'itemCssClass' => 'header__navigation-item',
					'items'=>array(
						array('label' => 'Главная', 'url' => array('/site/index')),
						array('label' => 'Профиль', 'url' => array('/user/profile'), 'visible' => !Yii::app()->user->isGuest),
						array('label' => 'Пользователи', 'url' => array('/user/index'), 'visible' => !Yii::app()->user->isGuest ),
						array('label' => 'Вход', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
						array('label' => 'Регистрация', 'url' => array('/site/register'), 'visible' => Yii::app()->user->isGuest),
						array('label' => 'Выйти ('.Yii::app()->user->name.')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest,)
					),
				)); ?>
			</nav>
		</header><!-- header -->
		<?php echo $content; ?>
	</div><!-- page -->

</body>
</html>
