<?php
/* @var $this AdminsController */
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
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>32,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>32,'maxlength'=>32,'value'=>'')); ?>
		<?php echo $form->error($model,'password'); ?>
		
	</div> 
	
	<div class="row">
		<?php echo $form->labelEx($model,'realname'); ?>
		<?php echo $form->textField($model,'realname',array('size'=>32,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'realname'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'sex'); ?>
		<?php echo $form->dropDownList($model,'sex',$model->sexList,array('style'=>'width:220px;')); ?>
		<?php echo $form->error($model,'sex'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>32,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'area'); ?>
		<?php echo $form->dropDownList($model,'area',CHtml::listData(Province::model()->findAll(array('condition'=>'validate=0 ')),'province_id','province_name'),array('style'=>'width:220px;')); ?>
		<?php echo $form->error($model,'province'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>32,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dep_id'); ?>
		<?php echo $form->dropDownList($model,'dep_id',$model->depList,array('style'=>'width:220px;')); ?>
		<?php echo $form->error($model,'dep_id'); ?>
		<?php $postid=Yii::app()->controller->module->getComponent('user')->post; if($postid ==1 or $postid==4 ){ ?> 
		<span><a href="/srbac/bmgl/create">点击增加部门</a></span>
		<?php  } ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'post'); ?>
		<?php echo $form->dropDownList($model,'post',$model->postList,array('style'=>'width:220px;')); ?>
		<?php echo $form->error($model,'post'); ?>
	</div>

	<?php if(1== Yii::app()->controller->module->getComponent('user')->site_id){?>
	<div class="row">
		<?php echo $form->labelEx($model,'cate'); ?>
		<?php echo $form->dropDownList($model,'cate',CHtml::listData(Cate::model()->findAll(array('condition'=>'status=0')),'id','name'),array('style'=>'width:220px;')); ?>
		<?php echo $form->error($model,'cate'); ?>
	</div> 

	<?php }  ?>

	<div class="row">
		<?php echo $form->labelEx($model,'validate'); ?>
		<?php echo $form->dropDownList($model,'validate',$model->statusList,array('style'=>'width:220px;')); ?>
		<?php echo $form->error($model,'validate'); ?>
	</div>
	<?php if(1== Yii::app()->controller->module->getComponent('user')->site_id){?>
	<div class="row">
		<?php echo $form->labelEx($model,'remark'); ?>
		<?php echo $form->textField($model,'remark',array('size'=>32,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'remark'); ?>
	</div>
	<?php }?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '提交' : '修改提交'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->