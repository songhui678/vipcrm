<?php
/* @var $this CaijiController */
/* @var $data Caiji */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url')); ?>:</b>
	<?php echo CHtml::encode($data->url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start_page')); ?>:</b>
	<?php echo CHtml::encode($data->start_page); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('stop_page')); ?>:</b>
	<?php echo CHtml::encode($data->stop_page); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cate_id')); ?>:</b>
	<?php echo CHtml::encode($data->cate_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('laiyuan')); ?>:</b>
	<?php echo CHtml::encode($data->laiyuan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code')); ?>:</b>
	<?php echo CHtml::encode($data->code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cate_name')); ?>:</b>
	<?php echo CHtml::encode($data->cate_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bianma')); ?>:</b>
	<?php echo CHtml::encode($data->bianma); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('img_path')); ?>:</b>
	<?php echo CHtml::encode($data->img_path); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('host')); ?>:</b>
	<?php echo CHtml::encode($data->host); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('guize_id')); ?>:</b>
	<?php echo CHtml::encode($data->guize_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('caiji_time')); ?>:</b>
	<?php echo CHtml::encode($data->caiji_time); ?>
	<br />

	*/ ?>

</div>