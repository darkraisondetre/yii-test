<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle = 'Error';
?>

<h2>Ошибка <?php echo $code; ?></h2>

<div class="error">
<?php echo CHtml::encode($message); ?>
</div>