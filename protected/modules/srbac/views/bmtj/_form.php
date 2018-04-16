<?php
/* @var $this TongjiController */
/* @var $model Client */
/* @var $form CActiveForm */
?>

<div class="form">

<?php if(Yii::app()->controller->module->getComponent('user')->post==1 || Yii::app()->controller->module->getComponent('user')->post==4){ ?>

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'client-jingli-form',
		'enableAjaxValidation'=>false,
		'action'=>'/srbac/bmtj/jingli',
	)); ?>
		<p class="note">带*号的为必填项</p>

		<?php echo $form->errorSummary($model); ?>
		<div class="row">
			查询各部门 开始时间：<?php echo $form->textField($model,'create_time',array('name'=>'pstarttime','class'=>'Wdate srk','onFocus'=>"WdatePicker({isShowClear:false,readOnly:true})",'id'=>'pstarttime')); ?>截止时间：<?php echo $form->textField($model,'create_time',array('name'=>'pstoptime','class'=>'Wdate srk','onFocus'=>"WdatePicker({isShowClear:false,readOnly:true})",'id'=>'pstoptime')); ?><?php echo CHtml::submitButton($model->isNewRecord ? '提交' : '修改'); ?>
		</div>
	<?php $this->endWidget(); ?>

<?php }  ?>
</div><!-- form -->

<table class="detail-view" id="yw0" style="margin-top:20px;background: none repeat scroll 0 0 white;border-collapse: collapse; width: 100%;">

    <tr><th>查询时间</th><th><font color="red"><?php echo $starttimes; ?></font></th><th>-</th><th><font color="red"><?php echo $stoptimes; ?></font></th> </tr>
	<tr style="background: none repeat scroll 0 0 rgb(229, 241, 244);height:30px;"><th>部门名称</th>
        <?php foreach($recordList as $k=>$v){?> 
             <th><?php echo $v->title; ?></th>
        <?php } ?>
		</tr>

	<?php if(!empty($bumenmany)){ ?>
          <?php   foreach($bumenmany as $k=>$v){ ?>
          	<tr style="background: none repeat scroll 0 0 rgb(248, 248, 248);height:0px;">
<td align='center' style="padding: 0.3em;"><a><?php echo $usernamemany[$k]; ?></td>          	<?php   foreach($v as $k=>$vv){ ?>
			     <td align='center'><a href="/srbac/bmtj/xiangxi/start/<?php echo $vv['start']; ?>/stop/<?php echo $vv['stop']; ?>/us/<?php echo $vv['us']; ?>/st/<?php echo $vv['id']; ?>" target="_blank"><?php echo $vv['value']; ?></a></td>
			     <?php }?> 
			   </tr >
            
		<?php } } ?>
		<tr style="background: none repeat scroll 0 0 rgb(248, 248, 248);height:0px;">
			    <?php if(!empty($total)){?> 
			     	<td align='center'>总计</td>
             		<?php foreach($total as $uks=>$uvs){?>
			       	<td align='center'><?php echo $uvs; ?></td>
			     <?php }} ?>  
			</tr >
</table>
<script>
	$("#client-jingli-form").click(
	    function(){
	      var m1 = $("#pstarttime").val();
	      var m2 = $("#pstoptime").val();                      
	      if(m1==""){
	          alert('开始时间不能为空');
	          return false;
	      }
	      if(m2==""){
	          alert('截止时间不能为空');
	          return false;
	      }
	      $('#client-jingli-form').submit();
	      return false;
	    }
	);       
</script>
