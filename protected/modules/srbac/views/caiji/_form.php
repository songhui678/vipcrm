<?php
/* @var $this CaijiController */
/* @var $model Caiji */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'caiji-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">带*号的为必填项</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type'); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'start_page'); ?>
		<?php echo $form->textField($model,'start_page'); ?>
		<?php echo $form->error($model,'start_page'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'stop_page'); ?>
		<?php echo $form->textField($model,'stop_page'); ?>
		<?php echo $form->error($model,'stop_page'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cate_id'); ?>
		<?php echo $form->textField($model,'cate_id'); ?>
		<?php echo $form->error($model,'cate_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'laiyuan'); ?>
		<?php echo $form->textField($model,'laiyuan',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'laiyuan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textField($model,'code'); ?>
		<?php echo $form->error($model,'code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cate_name'); ?>
		<?php echo $form->textField($model,'cate_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'cate_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bianma'); ?>
		<?php echo $form->textField($model,'bianma'); ?>
		<?php echo $form->error($model,'bianma'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'img_path'); ?>
		<?php echo $form->textField($model,'img_path',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'img_path'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'host'); ?>
		<?php echo $form->textField($model,'host',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'host'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'guize_id'); ?>
		<?php echo $form->textField($model,'guize_id'); ?>
		<?php echo $form->error($model,'guize_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'caiji_time'); ?>
		<?php echo $form->textField($model,'caiji_time'); ?>
		<?php echo $form->error($model,'caiji_time'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '创建' : '修改'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->