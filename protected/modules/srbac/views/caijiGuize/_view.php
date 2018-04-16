<?php
/* @var $this CaijiGuizeController */
/* @var $data CaijiGuize */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('guize_name')); ?>:</b>
	<?php echo CHtml::encode($data->guize_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('a_guize')); ?>:</b>
	<?php echo CHtml::encode($data->a_guize); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title_guize')); ?>:</b>
	<?php echo CHtml::encode($data->title_guize); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('content_guize')); ?>:</b>
	<?php echo CHtml::encode($data->content_guize); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('auto_keywords')); ?>:</b>
	<?php echo CHtml::encode($data->auto_keywords); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keywords_guize')); ?>:</b>
	<?php echo CHtml::encode($data->keywords_guize); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('des_guize')); ?>:</b>
	<?php echo CHtml::encode($data->des_guize); ?>
	<br />

	*/ ?>

</div>