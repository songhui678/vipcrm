<?php
/* @var $this BaikeController */
/* @var $model Baike */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'Baike-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">带*号的为必填项</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cateId'); ?>
		<?php echo $form->textField($model,'cateId'); ?>
		<?php echo $form->error($model,'cateId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'keywords'); ?>
		<?php echo $form->textField($model,'keywords',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'keywords'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_time'); ?>
		<?php echo $form->textField($model,'create_time',array('value'=>time())); ?>
		<?php echo $form->error($model,'create_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'des'); ?>
		<?php echo $form->textField($model,'des',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'des'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'click'); ?>
		<?php echo $form->textField($model,'click',array('value'=>rand(10,30))); ?>
		<?php echo $form->error($model,'click'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'img'); ?>
		<?php echo $form->textField($model,'img',array('size'=>60,'maxlength'=>111)); ?>
		<?php echo $form->error($model,'img'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>

		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
				<div style="padding-left:5px;">
			<?php $this->widget('ext.kindeditor.KindEditorWidget',array(
			      'id'=>'Baike_content',   //Textarea id
			      // Additional Parameters (Check http://www.kindsoft.net/docs/option.html)
			      'items' => array(
			          'width'=>'700px',
			          'height'=>'300px',
			          'themeType'=>'simple',
			          'allowImageUpload'=>true,
			          'allowFileManager'=>true,
					  
			          'items'=>array(
			              'source','|','fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic',
			              'underline', 'removeformat', '|', 'justifyleft', 'justifycenter',
			              'justifyright', 'insertorderedlist','insertunorderedlist', '|',
			              'emoticons', 'image', 'link')
			      ),
			)); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('value'=>1)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'source'); ?>
		<?php echo $form->textField($model,'source',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'source'); ?>
	</div> 

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '创建' : '修改'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->