<?php
/* @var $this TongjiController */
/* @var $model Client */
/* @var $form CActiveForm */
?>

<div class="form">



<?php if(Yii::app()->controller->module->getComponent('user')->post==2){ ?>

	<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'client-bumen-form',
	'enableAjaxValidation'=>false,
	'action'=>'/srbac/tongji/bumen',
)); ?>
	<p class="note">带*号的为必填项</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		查询部门 开始时间：<?php echo $form->textField($model,'create_time',array('name'=>'bstarttime','class'=>'Wdate srk','onFocus'=>"WdatePicker({isShowClear:false,readOnly:true})",'id'=>'bstarttime')); ?>截止时间：<?php echo $form->textField($model,'create_time',array('name'=>'bstoptime','class'=>'Wdate srk','onFocus'=>"WdatePicker({isShowClear:false,readOnly:true})",'id'=>'bstoptime')); ?><?php echo CHtml::submitButton($model->isNewRecord ? '提交' : '修改'); ?>
	</div>
	<?php $this->endWidget(); ?>

<?php } else if(Yii::app()->controller->module->getComponent('user')->post==3){ ?>
	
	<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'client-form',
	'enableAjaxValidation'=>false,
	'action'=>'/srbac/tongji/yuangong',
)); ?>
	<p class="note">带*号的为必填项</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		查询自己 开始时间：<?php echo $form->textField($model,'create_time',array('name'=>'starttime','class'=>'Wdate srk','onFocus'=>"WdatePicker({isShowClear:false,readOnly:true})",'id'=>'starttime')); ?>截止时间：<?php echo $form->textField($model,'create_time',array('name'=>'stoptime','class'=>'Wdate srk','onFocus'=>"WdatePicker({isShowClear:false,readOnly:true})",'id'=>'stoptime')); ?><?php echo CHtml::submitButton($model->isNewRecord ? '提交' : '修改'); ?>
	</div>
	<?php $this->endWidget(); ?>


<?php } else if(Yii::app()->controller->module->getComponent('user')->post==1 || Yii::app()->controller->module->getComponent('user')->post==4){ ?>

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'client-jingli-form',
		'enableAjaxValidation'=>false,
		'action'=>'/srbac/tongji/jingli',
	)); ?>
		<p class="note">带*号的为必填项</p>

		<?php echo $form->errorSummary($model); ?>
		<div class="row">
			查询全站 开始时间：<?php echo $form->textField($model,'create_time',array('name'=>'pstarttime','class'=>'Wdate srk','onFocus'=>"WdatePicker({isShowClear:false,readOnly:true})",'id'=>'pstarttime')); ?>截止时间：<?php echo $form->textField($model,'create_time',array('name'=>'pstoptime','class'=>'Wdate srk','onFocus'=>"WdatePicker({isShowClear:false,readOnly:true})",'id'=>'pstoptime')); ?><?php echo CHtml::submitButton($model->isNewRecord ? '提交' : '修改'); ?>
		</div>
	<?php $this->endWidget(); ?>

<?php }  ?>




</div><!-- form -->

<table class="detail-view" id="yw0" style="margin-top:20px;background: none repeat scroll 0 0 white;border-collapse: collapse; width: 100%;">

    <tr><th>查询时间</th><th><font color="red"><?php echo $starttimes; ?></font></th><th>-</th><th><font color="red"><?php echo $stoptimes; ?></font></th> </tr>
	<tr style="background: none repeat scroll 0 0 rgb(229, 241, 244);height:30px;"><th>业务人员</th>
        <?php foreach($recordList as $k=>$v){?> 
             <th><?php echo $v->title; ?></th>
        <?php } ?>
		</tr>

	<tr style="background: none repeat scroll 0 0 rgb(248, 248, 248);height:5px;" id="show">
		<?php if(Yii::app()->controller->module->getComponent('user')->post==3){ ?>
			<td align='center'><?php echo Yii::app()->controller->module->getComponent('user')->realname;?><td>
		<?php } ?>
	</tr>
	<?php if(!empty($bumenmany)){ ?>
          <?php   foreach($bumenmany as $k=>$v){ ?>
          	<tr style="background: none repeat scroll 0 0 rgb(248, 248, 248);height:0px;">
<td align='center' style="padding: 0.3em;"><a><?php echo $usernamemany[$k]; ?></td>          	<?php   foreach($v as $k=>$vv){ ?>
			     <td align='center'><a href="/srbac/tongji/xiangxi/start/<?php echo $vv['start']; ?>/stop/<?php echo $vv['stop']; ?>/us/<?php echo $vv['us']; ?>/st/<?php echo $vv['id']; ?>" target="_blank"><?php echo $vv['value']; ?></a></td>
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
	$("#client-form").click(
	    function(){
	      var m1 = $("#starttime").val();
	      var m2 = $("#stoptime").val();                      
	      if(m1==""){
	          alert('开始时间不能为空');
	          return false;
	      }
	      if(m2==""){
	          alert('截止时间不能为空');
	          return false;
	      }
	      $('#client-form').submit();
	      return false;
	    }
	); 

	$('#client-form').ajaxForm({
    dataType:'json',

    success:function(data) {
    	var str="<td align='center'><?php echo Yii::app()->controller->module->getComponent('user')->realname; ?></td>";
    	$.each(data,function(i,val){
    		str+="<td align='center'><a href='/srbac/tongji/xiangxi/start/"+val['start']+"/stop/"+val['stop']+"/userid/"+val['us']+"/st/"+val['id']+"' target='_blank'>"+val['value']+"</a></td>";
    	});
    	$('#show').html(str);
    }
  });

	$("#client-bumen-form").click(
	    function(){
	      var m1 = $("#bstarttime").val();
	      var m2 = $("#bstoptime").val();                      
	      if(m1==""){
	          alert('开始时间不能为空');
	          return false;
	      }
	      if(m2==""){
	          alert('截止时间不能为空');
	          return false;
	      }
	      $('#client-bumen-form').submit();
	      return false;
	    }
	); 

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
