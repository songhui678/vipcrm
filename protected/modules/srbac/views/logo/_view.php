<?php
/* @var $this LogoController */
/* @var $data Config */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('site_name')); ?>:</b>
	<?php echo CHtml::encode($data->site_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('site_url')); ?>:</b>
	<?php echo CHtml::encode($data->site_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('seo_title')); ?>:</b>
	<?php echo CHtml::encode($data->seo_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('seo_description')); ?>:</b>
	<?php echo CHtml::encode($data->seo_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('seo_keywords')); ?>:</b>
	<?php echo CHtml::encode($data->seo_keywords); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('site_logo')); ?>:</b>
	<?php echo CHtml::encode($data->site_logo); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('site_copyright')); ?>:</b>
	<?php echo CHtml::encode($data->site_copyright); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('site_code')); ?>:</b>
	<?php echo CHtml::encode($data->site_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('site_slogan')); ?>:</b>
	<?php echo CHtml::encode($data->site_slogan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('qq_key')); ?>:</b>
	<?php echo CHtml::encode($data->qq_key); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('qq_secret')); ?>:</b>
	<?php echo CHtml::encode($data->qq_secret); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sina_key')); ?>:</b>
	<?php echo CHtml::encode($data->sina_key); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sina_secret')); ?>:</b>
	<?php echo CHtml::encode($data->sina_secret); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('host')); ?>:</b>
	<?php echo CHtml::encode($data->host); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('port')); ?>:</b>
	<?php echo CHtml::encode($data->port); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('from')); ?>:</b>
	<?php echo CHtml::encode($data->from); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('site_id')); ?>:</b>
	<?php echo CHtml::encode($data->site_id); ?>
	<br />

	*/ ?>

</div>