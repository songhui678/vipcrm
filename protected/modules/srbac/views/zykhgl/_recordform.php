<?php
/* @var $this LianxijiluController */
/* @var $model ContactRecord */
/* @var $form CActiveForm */
?>
<!-- <h1>显示联系记录</h1> -->
<table class="detail-view" id="yw0"><tr class="odd"><th>新人</th><td style="width:150px;"><?php echo $kehumodel->bride;?></td><th>爱人</th><td >
	<?php echo $kehumodel->name;?></td></tr>
<tr class="even"><th>新人手机号</th><td><?php echo $kehumodel->bride_phone;?></td><th>爱人手机号</th><td><?php echo $kehumodel->phone;?></td></tr>
<tr class="odd"><th>座机</th><td><?php echo $kehumodel->tel;?></td><th>邮箱</th><td><?php echo $kehumodel->email;?></td></tr>
<tr class="odd"><th>Qq</th><td><?php echo $kehumodel->qq;?></td><th>地址</th><td><span class="null"><?php echo $kehumodel->ProvinceOne?$kehumodel->ProvinceOne->province_name:'';?><?php echo $kehumodel->address?$kehumodel->address:'';?></span></td></tr>
<tr class="even"><th>信息来源</th><td><?php echo $kehumodel->SourceOne?$kehumodel->SourceOne->name:'';?></td><th>预约到店日期</th><td><?php echo $kehumodel->timetodate2($kehumodel->eserve_time);?></td></tr>
<tr class="odd"><th>婚期</th><td><?php echo $kehumodel->marry_date;?></td><th>预算</th><td><?php echo $kehumodel->budget;?></td></tr>
<tr class="even"><th>更新时间</th><td><?php echo $kehumodel->timetodate($kehumodel->update_time);?></td></tr>
<tr class="odd">
	<th>微信号</th>
	<td><span ><?php echo $kehumodel->wx;?></span></td>
	<th>备注</th>
	<td><?php echo $kehumodel->remarks;?></td>
</tr>

<tr class="odd"><td>客户其他资料</td></tr>
<tr class="even"><th>联系情况</th><td>
	<?php if(Yii::app()->controller->module->getComponent('user')->post==1||Yii::app()->controller->module->getComponent('user')->post==4){?>
		市场：<?php echo $kehumodel->SRecordOne?$kehumodel->SRecordOne->title:"暂无";?>;
		销售：<?php echo $kehumodel->XRecordOne?$kehumodel->XRecordOne->title:"暂无";?>
	<?php } else{ ?>
	<?php if(Yii::app()->controller->module->getComponent('user')->type==1){?>
		<?php echo $kehumodel->SRecordOne?$kehumodel->SRecordOne->title:"暂无";?>
	<?php } else if(Yii::app()->controller->module->getComponent('user')->type==2){?>	 <?php echo $kehumodel->XRecordOne?$kehumodel->XRecordOne->title:"暂无";?>
	<?php }} ?>


</td><th>状态</th><td><?php echo $kehumodel->statusName;?></td></tr>
<tr class="odd"><th>创建时间</th><td><?php echo $kehumodel->timetodate($kehumodel->create_time);?></td><th>录入人员</th><td><?php echo $kehumodel->LuruOne->realname;?></td></tr>

<?php if($kehumodel->order_status==1){?>
<tr class="odd"><td>客户的订单情况</td><td style="background-color:white;"><a href="/srbac/kehu/update/id/<?php echo $kehumodel->id;?>#Client_order_status" >修改订单详情</a></td></tr>
<tr class="even"><th>订单总额</th><td><?php echo $kehumodel->prcie_total;?></td><th>定金</th><td><?php echo $kehumodel->deposit;?></td></tr>
<tr class="odd"><th>订单日期</th><td><?php echo $kehumodel->timetodate2($kehumodel->deposit_time);?></td><th>签单人</th><td><?php echo $kehumodel->sign_user;?></td></tr>
<tr class="even"><th>合同编号</th><td><?php echo $kehumodel->contract_code;?></td></tr>

<?php if(Yii::app()->controller->module->getComponent('user')->cate==21){?>
<tr class="odd"><td>订单详情</td></tr>
<tr class="even"><th>拍摄日期</th><td><?php echo $kehumodel->timetodate2($kehumodel->photo_date);?></td><th>选片日期</th><td><?php echo $kehumodel->timetodate2($kehumodel->choose_date);?></td></tr>
<tr class="odd"><th>摄影师</th><td><?php echo $kehumodel->photographer;?></td><th>化妆师</th><td><?php echo $kehumodel->makeupartist;?></td></tr>
<tr class="even"><th>看设计日期</th><td><?php echo $kehumodel->timetodate2($kehumodel->design_date);?></td><th>取片日期</th><td><?php echo $kehumodel->timetodate2($kehumodel->taketablets_date);?></td></tr>

<?php } else if(Yii::app()->controller->module->getComponent('user')->cate==22){?>
	<tr class="odd"><td>订单详情</td></tr>
<tr class="even"><th>看场地日期</th><td><?php echo $kehumodel->timetodate2($kehumodel->looksite_date);?></td><th>谈风格日期</th><td><?php echo $kehumodel->timetodate2($kehumodel->style_date);?></td></tr>
<tr class="odd"><th>看方案日期</th><td><?php echo $kehumodel->timetodate2($kehumodel->scheme_date);?></td><th>试装日期</th><td><?php echo $kehumodel->timetodate2($kehumodel->makeup_date);?></td></tr>
<tr class="even"><th>司仪日期</th><td><?php echo $kehumodel->timetodate2($kehumodel->compere_date);?></td><th>彩排布置日期</th><td><?php echo $kehumodel->timetodate2($kehumodel->rehearsal_date);?></td></tr>
<tr class="odd"><th>执行人</th><td><?php echo $kehumodel->executor;?></td><th>取婚礼光盘日期</th><td><?php echo $kehumodel->timetodate2($kehumodel->taketablets_date);?></td></tr>

<?php } else if(Yii::app()->controller->module->getComponent('user')->cate==23){?>
    <tr class="odd"><th>取片日期</th><td><?php echo $kehumodel->timetodate2($kehumodel->taketablets_date);?></td></tr>
<?php } else if(Yii::app()->controller->module->getComponent('user')->cate==24){?>
  <tr class="odd"><th>取片日期</th><td><?php echo $kehumodel->timetodate2($kehumodel->taketablets_date);?></td></tr>
<?php }}  else{?> 
<tr class="odd"><td style="color:red;">此客户没有订单</td></tr>
<?php } ?> 
<?php echo $kehumodel->timetodate2($kehumodel->remind_time);?>
</table>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$kehumodel,
	'attributes'=>array(	
	),
)); ?>
<!-- search-form -->
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'contact-record-grid',
	'dataProvider'=>$model->kehusearch($kehumodel->id),
	// 'filter'=>$model,
	'columns'=>array(
		// 'client_id',
		array(
			'header'=>'联系时间',
			'name'=>'contact_time',
			'value'=>'$data->timetodate',
		),

		array(
		 'header'=>'内容',
		 'name'=>'content',
		 'htmlOptions' => array(
         'style'=>'width:300px;'
          ),
        ),
		array(
			'header'=>'业务人员',
			'name'=>'personnel',
			'value'=>'$data->AdminsOne->realname',
			'visible'=>Yii::app()->controller->module->getComponent('user')->post!=3
		),
		array(
			'header'=>'联系情况',
			'name'=>'result',
			'value'=>'$data->RecordOne->title',
		),
		// 'remark',
		// array(
      // 'class'=>'CButtonColumn',
      // 'template'=>'',
      // 'htmlOptions' => array(
      //   'style'=>'width:100px; text-align:center;'
      // ),
      // 'buttons'=>array
      //   (
      //     'xianshi' => array
      //       (
      //           'label'=>'显示',
      //           'url'=>'Yii::app()->createUrl("/".Yii::app()->controller->module->name."/".Yii::app()->controller->id."/recordview", array("id"=>$data->client_id))',
      //       ),
      //       'bianji' => array
      //       (
      //           'label'=>'编辑',
      //           'url'=>'Yii::app()->createUrl("/".Yii::app()->controller->module->name."/".Yii::app()->controller->id."/recordupdate", array("id"=>$data->client_id))',
      //       ),
      //       'shanchu' => array
      //       (
      //           'label'=>'删除',
      //           'url'=>'Yii::app()->createUrl("/".Yii::app()->controller->module->name."/".Yii::app()->controller->id."/recorddelete", array("id"=>$data->client_id))',
      //       ),
      //   ),
      // ),
	),
)); ?>
