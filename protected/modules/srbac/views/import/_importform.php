<?php
/* @var $this ImportController */
/* @var $model ImportFile */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'import-file-form',
	'enableAjaxValidation'=>false,	
	'action'=>"/srbac/import/import",
)); ?>

	<p class="note">带*号的为必填项</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<label>上传的文件：<?php echo $model->title;?></label>
		<?php echo $form->hiddenField($model,'id',array('name'=>'importid','size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<label>要导入数据的来源</label>
		<?php echo $form->dropDownList($model,'title',CHtml::listData(Sources::model()->findAll(array('condition'=>'validate=0 and site_id='.Yii::app()->controller->module->getComponent('user')->site_id)),'id','name'),array('style'=>'width:305px;','name'=>'source')); ?><font color="red">*</font>输入来源名称<input name='aa' id="aa"/> <span id="ss" style="cursor: pointer;">查询</span><span id="cc"></span>
		<?php echo $form->error($model,'title'); ?>
	</div>
	<?php if(Yii::app()->controller->module->getComponent('user')->post==1 || Yii::app()->controller->module->getComponent('user')->post==4){?>
	<div class="row">
		<label>录入来源</label>
		<?php echo $form->dropDownList($model,'status',$model->EntrystatusArr,array('style'=>'width:305px;','name'=>'entry_status')); ?><font color="red">*</font>
	</div>
	<?php }?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '提交' : '开始导入'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script type="text/javascript">
 $('#ss').click(function(){
    var name=$('#aa').val();
    $.ajax({
             type: "POST",
             url: "/srbac/kehu/ajaxSources",
             data: "name="+name,
             success: function(msg){
                $('#cc').html(msg);
             }
          });
    
 });
 var changeAll = function (qid){
	$('#source option').each(function(){
		if($(this).val()==qid){
		 	$(this).attr('selected','selected');
		}
	});
 }
</script>