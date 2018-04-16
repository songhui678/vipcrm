<?php
/* @var $this KehuController */
/* @var $model Client */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row" style="padding-top:30px;">
		<?php echo $form->label($model,'bride'); ?>
		<?php echo $form->textField($model,'bride',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bride_phone'); ?>
		<?php echo $form->textField($model,'bride_phone',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>50,'maxlength'=>50)); ?>
	</div>

    <div class="row">
		<?php echo $form->label($model,'province'); ?>
		<?php echo $form->dropDownList($model,'province',CHtml::listData(Province::model()->findAll(array('condition'=>'validate=0 ')),'province_id','province_name'),array('style'=>'width:200px;','empty'=>'-不限-')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'qq'); ?>
		<?php echo $form->textField($model,'qq',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wx'); ?>
		<?php echo $form->textField($model,'wx',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wangwang'); ?>
		<?php echo $form->textField($model,'wangwang',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usiness'); ?>
		<?php echo $form->dropDownList($model,'situation',CHtml::listData(Admins::model()->findAll('site_id=:site_id and validate=1',array(':site_id'=>Yii::app()->controller->module->getComponent('user')->site_id)), 'userid', 'realname'),array('style'=>'width:200px;','empty'=>'-不限-')); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'entry'); ?>
		<?php echo $form->dropDownList($model,'situation',CHtml::listData(Admins::model()->findAll('site_id=:site_id and validate=1',array(':site_id'=>Yii::app()->controller->module->getComponent('user')->site_id)), 'userid', 'realname'),array('style'=>'width:200px;','empty'=>'-不限-')); ?>
	</div>
	<?php if(Yii::app()->controller->module->getComponent('user')->post==1 || Yii::app()->controller->module->getComponent('user')->post==4){?>
	<div class="row">
		<?php echo $form->label($model,'entry_status'); ?>
		<?php echo $form->dropDownList($model,'entry_status',$model->EntrystatusArr,array('style'=>'width:200px;','empty'=>'-不限-')); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'situation'); ?>
		<?php echo $form->dropDownList($model,'situation',CHtml::listData(Record::model()->findAll('site_id=:site_id and validate=1 and type=1',array(':site_id'=>Yii::app()->controller->module->getComponent('user')->site_id)), 'id', 'title'),array('style'=>'width:200px;','empty'=>'-不限-')); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'xsituation'); ?>
		<?php echo $form->dropDownList($model,'xsituation',CHtml::listData(Record::model()->findAll('site_id=:site_id and validate=1 and type=2',array(':site_id'=>Yii::app()->controller->module->getComponent('user')->site_id)), 'id', 'title'),array('style'=>'width:200px;','empty'=>'-不限-')); ?>
	</div>
	<?php } else if(Yii::app()->controller->module->getComponent('user')->type==1){?>
		<div class="row">
			<?php echo $form->label($model,'situation'); ?>
			<?php echo $form->dropDownList($model,'situation',CHtml::listData(Record::model()->findAll('site_id=:site_id and validate=1',array(':site_id'=>Yii::app()->controller->module->getComponent('user')->site_id)), 'id', 'title'),array('style'=>'width:200px;','empty'=>'-不限-')); ?>
		</div>

	<?php } else if(Yii::app()->controller->module->getComponent('user')->type==2){?>
		<div class="row">
			<?php echo $form->label($model,'xsituation'); ?>
			<?php echo $form->dropDownList($model,'xsituation',CHtml::listData(Record::model()->findAll('site_id=:site_id and validate=1',array(':site_id'=>Yii::app()->controller->module->getComponent('user')->site_id)), 'id', 'title'),array('style'=>'width:200px;','empty'=>'-不限-')); ?>
		</div>
	<?php }?>
	

	<div class="row">
		<?php echo $form->label($model,'source'); ?>
		<?php echo $form->dropDownList($model,'source',CHtml::listData(Sources::model()->findAll(array('condition'=>'validate=0 and site_id='.Yii::app()->controller->module->getComponent('user')->site_id)),'id','name'),array('style'=>'width:200px;','empty'=>'-请选择-')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'marry_date'); ?>
		<?php echo $form->textField($model,'marry_date',array('size'=>30,'maxlength'=>50,'class'=>'Wdate srk','onFocus'=>"WdatePicker({isShowClear:false,readOnly:true})")); ?>
	</div> 

	<div class="row">
		<?php echo $form->label($model,'order_status'); ?>
		<?php echo $form->RadioButtonList($model,'order_status',$model->OrderStatusArr,array('separator'=>'&nbsp','labelOptions'=>array('style'=>'display:inline-block;width:auto;float:none;color:#ff00ee;'))); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'contract_code'); ?>
		<?php echo $form->textField($model,'contract_code',array('size'=>30,'maxlength'=>50,)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('查询'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->