<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->pageTitle = 'Список пользователей';
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_user',
	'summaryText' => '',
	'itemsCssClass' => 'users'
)); ?>
