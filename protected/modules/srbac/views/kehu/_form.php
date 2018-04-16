<?php
/* @var $this KehuController */
/* @var $model Client */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'client-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">带*号的为必填项</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row" style="color:red">
		提示*新人/新人手机 或 爱人/爱人手机 其中一组必填
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'bride'); ?>
		<?php echo $form->textField($model,'bride',array('size'=>50,'maxlength'=>50)); ?><font color="red">*</font>
		<?php echo $form->error($model,'bride',array('style'=>'color:red')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bride_phone'); ?>
		<?php echo $form->textField($model,'bride_phone',array('size'=>50,'maxlength'=>50)); ?><font color="red">*</font>
		<?php echo $form->error($model,'bride_phone',array('style'=>'color:red')); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?><font color="red">*</font>
		<?php echo $form->error($model,'name',array('style'=>'color:red')); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>50,'maxlength'=>50)); ?><font color="red">*</font>
		<?php echo $form->error($model,'phone',array('style'=>'color:red')); ?>
	</div>
     
	<div class="row">
		<?php echo $form->labelEx($model,'source'); ?>
		<?php echo $form->dropDownList($model,'source',CHtml::listData(Sources::model()->findAll(array('condition'=>'validate=0 and site_id='.Yii::app()->controller->module->getComponent('user')->site_id)),'id','name'),array('style'=>'width:305px;',)); ?><font color="red">*</font>输入来源名称<input name='aa' id="aa"/> <span id="ss" style="cursor: pointer;">查询</span><span id="cc"></span>
		<?php echo $form->error($model,'source'); ?>
	</div>

    <div class="row">
		<?php echo $form->labelEx($model,'province'); ?>
		<?php echo $form->dropDownList($model,'province',CHtml::listData(Province::model()->findAll(array('condition'=>'validate=0 ')),'province_id','province_name'),array('style'=>'width:305px;')); ?><font color="red">*</font>
		<?php echo $form->error($model,'province'); ?>
	</div>
	<?php if($model->isNewRecord){?>
	<?php if(Yii::app()->controller->module->getComponent('user')->post==1 || Yii::app()->controller->module->getComponent('user')->post==4){?>
	<div class="row">
		<?php echo $form->labelEx($model,'entry_status'); ?>
		<?php echo $form->dropDownList($model,'entry_status',$model->EntrystatusArr,array('style'=>'width:305px;')); ?><font color="red">*</font>
		<?php echo $form->error($model,'entry_status'); ?>
	</div>
	<?php }} ?>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>255)); ?>(可以不填)
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'zip'); ?>
		<?php echo $form->textField($model,'zip'); ?>(可以不填)
		<?php echo $form->error($model,'zip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tel'); ?>
		<?php echo $form->textField($model,'tel',array('size'=>50,'maxlength'=>50)); ?>(可以不填)
		<?php echo $form->error($model,'tel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>50)); ?>(可以不填)
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'qq'); ?>
		<?php echo $form->textField($model,'qq',array('size'=>50,'maxlength'=>50)); ?>(可以不填)
		<?php echo $form->error($model,'qq'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'wx'); ?>
		<?php echo $form->textField($model,'wx',array('size'=>50,'maxlength'=>50)); ?>(可以不填)
		<?php echo $form->error($model,'wx'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'wangwang'); ?>
		<?php echo $form->textField($model,'wangwang',array('size'=>50,'maxlength'=>50)); ?>(可以不填)
		<?php echo $form->error($model,'wangwang'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'eserve_time'); ?>
		<?php echo $form->textField($model,'eserve_time',array('size'=>50,'maxlength'=>50,'value'=>$model->timetodate2($model->eserve_time),'class'=>'Wdate srk','onFocus'=>"WdatePicker({isShowClear:false,readOnly:true})")); ?>(可以不填)
		<?php echo $form->error($model,'eserve_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'marry_date'); ?>
		<?php echo $form->textField($model,'marry_date',array('size'=>50,'maxlength'=>50,'class'=>'Wdate srk','onFocus'=>"WdatePicker({isShowClear:false,readOnly:true})")); ?>(可以不填)
		<?php echo $form->error($model,'marry_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'budget'); ?>
		<?php echo $form->textField($model,'budget',array('size'=>50,'maxlength'=>50)); ?>(可以不填)
		<?php echo $form->error($model,'budget'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'remarks'); ?>
		<?php echo $form->textArea($model,'remarks',array('rows'=>6, 'cols'=>50)); ?>(可以不填)
		<?php echo $form->error($model,'remarks'); ?>
	</div>	

	<div class="row">
		<?php echo $form->labelEx($model,'order_status'); ?>
		<?php echo $form->RadioButtonList($model,'order_status',$model->OrderStatusArr,array('separator'=>'&nbsp','labelOptions'=>array('style'=>'display:inline-block;width:auto;float:none;color:#ff00ee;'))); ?>&nbsp;&nbsp;<font color="red">*</font>
		<?php echo $form->error($model,'order_status'); ?>
	</div>

	<div id="yuding" style="display:none;">
	<div class="row">
		<?php echo $form->labelEx($model,'contract_code'); ?>
		<?php echo $form->textField($model,'contract_code',array('size'=>50,'maxlength'=>50,)); ?>(可以不填)
		<?php echo $form->error($model,'contract_code'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'prcie_total'); ?>
		<?php echo $form->textField($model,'prcie_total'); ?>(可以不填)
		<?php echo $form->error($model,'prcie_total'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'deposit'); ?>
		<?php echo $form->textField($model,'deposit'); ?>(可以不填)
		<?php echo $form->error($model,'deposit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'deposit_time'); ?>
		<?php echo $form->textField($model,'deposit_time',array('size'=>50,'maxlength'=>50,'value'=>$model->timetodate2($model->deposit_time),'class'=>'Wdate srk','onFocus'=>"WdatePicker({isShowClear:false,readOnly:true})")); ?>(可以不填)
		<?php echo $form->error($model,'deposit_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sign_user'); ?>
		<?php echo $form->textField($model,'sign_user',array('size'=>50,'maxlength'=>50)); ?>(可以不填)
		<?php echo $form->error($model,'sign_user'); ?>
	</div>	

 <?php if(Yii::app()->controller->module->getComponent('user')->cate==21){?>

    <div class="row">
		<?php echo $form->labelEx($model,'photo_date'); ?>
		<?php echo $form->textField($model,'photo_date',array('size'=>50,'maxlength'=>50,'value'=>$model->timetodate2($model->photo_date),'class'=>'Wdate srk','onFocus'=>"WdatePicker({isShowClear:false,readOnly:true})")); ?>(可以不填)
		<?php echo $form->error($model,'photo_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'choose_date'); ?>
		<?php echo $form->textField($model,'choose_date',array('size'=>50,'maxlength'=>50,'value'=>$model->timetodate2($model->choose_date),'class'=>'Wdate srk','onFocus'=>"WdatePicker({isShowClear:false,readOnly:true})")); ?>(可以不填)
		<?php echo $form->error($model,'choose_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'photographer'); ?>
		<?php echo $form->textField($model,'photographer',array('size'=>50,'maxlength'=>50)); ?>(可以不填)
		<?php echo $form->error($model,'photographer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'makeupartist'); ?>
		<?php echo $form->textField($model,'makeupartist',array('size'=>50,'maxlength'=>50)); ?>(可以不填)
		<?php echo $form->error($model,'makeupartist'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'design_date'); ?>
		<?php echo $form->textField($model,'design_date',array('size'=>50,'maxlength'=>50,'value'=>$model->timetodate2($model->design_date),'class'=>'Wdate srk','onFocus'=>"WdatePicker({isShowClear:false,readOnly:true})")); ?>(可以不填)
		<?php echo $form->error($model,'design_date'); ?>
	</div>

	<div class="row">
		<label>取件日期</label>
		<?php echo $form->textField($model,'taketablets_date',array('size'=>50,'maxlength'=>50,'value'=>$model->timetodate2($model->taketablets_date),'class'=>'Wdate srk','onFocus'=>"WdatePicker({isShowClear:false,readOnly:true})")); ?>(可以不填)
		<?php echo $form->error($model,'taketablets_date'); ?>
	</div>

<?php } else if(Yii::app()->controller->module->getComponent('user')->cate==22){?>

	<div class="row">
		<?php echo $form->labelEx($model,'looksite_date'); ?>
		<?php echo $form->textField($model,'looksite_date',array('size'=>50,'maxlength'=>50,'value'=>$model->timetodate2($model->looksite_date),'class'=>'Wdate srk','onFocus'=>"WdatePicker({isShowClear:false,readOnly:true})")); ?>(可以不填)
		<?php echo $form->error($model,'looksite_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'style_date'); ?>
		<?php echo $form->textField($model,'style_date',array('size'=>50,'maxlength'=>50,'value'=>$model->timetodate2($model->style_date),'class'=>'Wdate srk','onFocus'=>"WdatePicker({isShowClear:false,readOnly:true})")); ?>(可以不填)
		<?php echo $form->error($model,'style_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'scheme_date'); ?>
		<?php echo $form->textField($model,'scheme_date',array('size'=>50,'maxlength'=>50,'value'=>$model->timetodate2($model->scheme_date),'class'=>'Wdate srk','onFocus'=>"WdatePicker({isShowClear:false,readOnly:true})")); ?>(可以不填)
		<?php echo $form->error($model,'scheme_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'makeup_date'); ?>
		<?php echo $form->textField($model,'makeup_date',array('size'=>50,'maxlength'=>50,'value'=>$model->timetodate2($model->makeup_date),'class'=>'Wdate srk','onFocus'=>"WdatePicker({isShowClear:false,readOnly:true})")); ?>(可以不填)
		<?php echo $form->error($model,'makeup_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'compere_date'); ?>
		<?php echo $form->textField($model,'compere_date',array('size'=>50,'maxlength'=>50,'value'=>$model->timetodate2($model->compere_date),'class'=>'Wdate srk','onFocus'=>"WdatePicker({isShowClear:false,readOnly:true})")); ?>(可以不填)
		<?php echo $form->error($model,'compere_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rehearsal_date'); ?>
		<?php echo $form->textField($model,'rehearsal_date',array('size'=>50,'maxlength'=>50,'value'=>$model->timetodate2($model->rehearsal_date),'class'=>'Wdate srk','onFocus'=>"WdatePicker({isShowClear:false,readOnly:true})")); ?>(可以不填)
		<?php echo $form->error($model,'rehearsal_date'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'taketablets_date'); ?>
		<?php echo $form->textField($model,'taketablets_date',array('size'=>50,'maxlength'=>50,'value'=>$model->timetodate2($model->taketablets_date),'class'=>'Wdate srk','onFocus'=>"WdatePicker({isShowClear:false,readOnly:true})")); ?>(可以不填)
		<?php echo $form->error($model,'taketablets_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'executor'); ?>
		<?php echo $form->textField($model,'executor',array('size'=>50,'maxlength'=>50)); ?>(可以不填)
		<?php echo $form->error($model,'executor'); ?>
	</div>

<?php } else if(Yii::app()->controller->module->getComponent('user')->cate==23){?>
    <div class="row">
		<?php echo $form->labelEx($model,'taketablets_date'); ?>
		<?php echo $form->textField($model,'taketablets_date',array('size'=>50,'maxlength'=>50,'value'=>$model->timetodate2($model->taketablets_date),'class'=>'Wdate srk','onFocus'=>"WdatePicker({isShowClear:false,readOnly:true})")); ?>(可以不填)
		<?php echo $form->error($model,'taketablets_date'); ?>
	</div>

<?php } else if(Yii::app()->controller->module->getComponent('user')->cate==24){?>

    <div class="row">
		<?php echo $form->labelEx($model,'taketablets_date'); ?>
		<?php echo $form->textField($model,'taketablets_date',array('size'=>50,'maxlength'=>50,'value'=>$model->timetodate2($model->taketablets_date),'class'=>'Wdate srk','onFocus'=>"WdatePicker({isShowClear:false,readOnly:true})")); ?>(可以不填)
		<?php echo $form->error($model,'taketablets_date'); ?>
	</div>
<?php }?></div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '提交' : '修改提交',array('style'=>'width:120px;height:30px;')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script type="text/javascript">
$(function(){
	if($("#Client_order_status_1").attr("checked")=="checked"){
			$("#yuding").show();
    }
}); 

$('#Client_order_status_1').click(function(){
  $("#yuding").show();

});

$('#Client_order_status_0').click(function(){
  $("#yuding").hide();
  
});
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
	$('#Client_source option').each(function(){
		if($(this).val()==qid){
		 	$(this).attr('selected','selected');
		}
	});
 }
</script>