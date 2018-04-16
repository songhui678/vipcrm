<?php
/* @var $this CaijiArticleController */
/* @var $model CaijiArticle */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'caiji-article-form',
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
	<?php echo $form->labelEx($model,'content'); ?>
		<div style="padding-left:5px;">
			<?php $this->widget('ext.kindeditor.KindEditorWidget',array(
			      'id'=>'CaijiArticle_content',   //Textarea id
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
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'keywords'); ?>
		<?php echo $form->textField($model,'keywords',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'keywords'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'des'); ?>
		<?php echo $form->textField($model,'des',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'des'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_time'); ?>
		<?php echo $form->textField($model,'create_time'); ?>
		<?php echo $form->error($model,'create_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mark'); ?>
		<?php echo $form->textArea($model,'mark',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'mark'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'caiji_id'); ?>
		<?php echo $form->textField($model,'caiji_id'); ?>
		<?php echo $form->error($model,'caiji_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'click'); ?>
		<?php echo $form->textField($model,'click'); ?>
		<?php echo $form->error($model,'click'); ?>
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

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '创建' : '修改'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->