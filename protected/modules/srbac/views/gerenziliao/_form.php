<?php
/* @var $this GerenziliaoController */
/* @var $model Admins */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'admins-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">带*号的为必填项</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<label>用户名</label>
		<span style="margin-left:5px; color:#999"><?php echo $model->username  ?></span>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>32,'maxlength'=>32,'value'=>'')); ?>
		<?php echo $form->error($model,'password'); ?>
		<span style="color:red">为空则不修改密码！</span>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'重复密码'); ?>
		<?php echo $form->passwordField($model,'passwordrepeat',array('size'=>32,'maxlength'=>32,'value'=>'')); ?>
		<?php echo $form->error($model,'passwordrepeat'); ?>
		<span style="color:red">为空则不修改密码！</span>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'realname'); ?>
		<?php echo $form->textField($model,'realname',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'realname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sex'); ?>
		<?php echo $form->dropDownList($model,'sex',$model->sexList,array('style'=>'width:220px;')); ?>
		<?php echo $form->error($model,'sex'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'area'); ?>
		<?php echo $form->dropDownList($model,'area',CHtml::listData(Province::model()->findAll(array('condition'=>'validate=0 ')),'province_id','province_name'),array('style'=>'width:220px;')); ?>
		<?php echo $form->error($model,'province'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>32,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
	<!-- <div class="row">
		<?php echo $form->labelEx($model,'userid'); ?>
		<?php echo $form->textField($model,'userid',array('size'=>32,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'userid'); ?>
	</div> -->
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '创建' : '提交'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->