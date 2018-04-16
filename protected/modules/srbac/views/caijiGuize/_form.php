<?php
/* @var $this CaijiGuizeController */
/* @var $model CaijiGuize */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'caiji-guize-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">带*号的为必填项</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'guize_name'); ?>
		<?php echo $form->textField($model,'guize_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'guize_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'a_guize'); ?>
		<?php echo $form->textArea($model,'a_guize',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'a_guize'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title_guize'); ?>
		<?php echo $form->textArea($model,'title_guize',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'title_guize'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content_guize'); ?>
		<?php echo $form->textArea($model,'content_guize',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'content_guize'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'auto_keywords'); ?>
		<?php echo $form->textField($model,'auto_keywords'); ?>
		<?php echo $form->error($model,'auto_keywords'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'keywords_guize'); ?>
		<?php echo $form->textArea($model,'keywords_guize',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'keywords_guize'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'des_guize'); ?>
		<?php echo $form->textArea($model,'des_guize',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'des_guize'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '创建' : '修改'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->