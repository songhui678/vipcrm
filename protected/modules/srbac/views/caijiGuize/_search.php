<?php
/* @var $this CaijiGuizeController */
/* @var $model CaijiGuize */
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
		<?php echo $form->label($model,'guize_name'); ?>
		<?php echo $form->textField($model,'guize_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'a_guize'); ?>
		<?php echo $form->textArea($model,'a_guize',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'title_guize'); ?>
		<?php echo $form->textArea($model,'title_guize',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'content_guize'); ?>
		<?php echo $form->textArea($model,'content_guize',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'auto_keywords'); ?>
		<?php echo $form->textField($model,'auto_keywords'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'keywords_guize'); ?>
		<?php echo $form->textArea($model,'keywords_guize',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'des_guize'); ?>
		<?php echo $form->textArea($model,'des_guize',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->