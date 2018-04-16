<?php
/* @var $this CaijiController */
/* @var $model Caiji */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type'); ?>
		<?php echo $form->textField($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'start_page'); ?>
		<?php echo $form->textField($model,'start_page'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'stop_page'); ?>
		<?php echo $form->textField($model,'stop_page'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cate_id'); ?>
		<?php echo $form->textField($model,'cate_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'laiyuan'); ?>
		<?php echo $form->textField($model,'laiyuan',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'code'); ?>
		<?php echo $form->textField($model,'code'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cate_name'); ?>
		<?php echo $form->textField($model,'cate_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bianma'); ?>
		<?php echo $form->textField($model,'bianma'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'img_path'); ?>
		<?php echo $form->textField($model,'img_path',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'host'); ?>
		<?php echo $form->textField($model,'host',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'guize_id'); ?>
		<?php echo $form->textField($model,'guize_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'caiji_time'); ?>
		<?php echo $form->textField($model,'caiji_time'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->