<?php
/* @var $this ZykhglController */
/* @var $model ChangeClient */

$this->breadcrumbs=array(
	'Change Clients'=>array('index'),
	'管理',
);

$this->menu=array(
);

Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
	$('#change-client-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>管理转移客户表</h1>
<!-- search-form -->
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'change-client-grid',
	'dataProvider'=>$model->with('ClientOne')->searchzy(),
	'filter'=>$model,
	'columns'=>array(
        array(
            'header'=>'新人',
            // 'name'=>'ClientOne.bride',
            'name'=>'name',
            // 'value'=>'$data->ClientOne->bride',
            'type'=>'raw',
            'value'=>'CHtml::link($data->ClientOne->bride,"/srbac/zykhgl/lianxi/id/".$data->ClientOne->id,array("target"=>"_blank","title"=>"查看详细"))',
            'htmlOptions'=>array('style'=>'text-align:center; width:40px;'),
        ),
        array(
            'header'=>'新人手机',
            // 'name'=>'ClientOne.bride_phone',
            'name'=>'mobile',
            'value'=>'$data->ClientOne->bride_phone',
            // 'type'=>'raw',
            'htmlOptions'=>array('style'=>'text-align:center; width:50px;','oncontextmenu'=>'return false;','oncopy'=>'return false;','oncut'=>'return false;',),
        ),
        array(
            'header'=>'站点',
            'name'=>'AdminsOne.realname',
            'filter'=>CHtml::listData(Admins::model()->findAll('post=1 and validate=1'),'site_id', 'realname'),
            'visible'=>Yii::app()->controller->module->getComponent('user')->__id==1,
        ),
        array(
            'header'=>'转入部门',
            'name'=>'zrdep',
            'value' => '$data->ClientOne->DepOne->name',
            'filter' => CHtml::listData(Department::model()->findAll(array('condition'=>'validate=1')),'id','name'),
            'visible'=>Yii::app()->controller->module->getComponent('user')->post==1 || Yii::app()->controller->module->getComponent('user')->post==2|| Yii::app()->controller->module->getComponent('user')->post==4
        ),
        array(
            'header'=>'部门',
            'name'=>'dep_id',
            'value'=>'$data->DepOne?$data->DepOne->name:"无部门"',
            // 'filter'=>CHtml::listData(Department::model()->findAll(array('condition'=>'validate=1 and id='.Yii::app()->controller->module->getComponent('user')->dep_id)),'id','name'),
            'filter'=>CHtml::listData(Department::model()->findAll(array('condition'=>'validate=1')),'id','name'),
            'visible'=>Yii::app()->controller->module->getComponent('user')->post==1 || Yii::app()->controller->module->getComponent('user')->post==2|| Yii::app()->controller->module->getComponent('user')->post==4
        ),
        array(
            'header'=>'市场联系状态',
            'name'=>'sclx',
            'value' => '$data->ClientOne->SRecordOne->title',
            'filter'=>CHtml::listData(Record::model()->findAll('validate=1 and type=1'),'id', 'title'),
        ),   // 
        array(
            'header'=>'销售联系状态',
            'name'=>'xslx',
            'value' => '$data->ClientOne->XRecordOne->title',
            'filter'=>CHtml::listData(Record::model()->findAll('validate=1 and type=2'),'id', 'title'),
        ), 
        array(
            'header'=>'来源',
            'name'=>'source',
            'value' => '$data->ClientOne->SourceOne?$data->ClientOne->SourceOne->name:""',
            'filter'=>CHtml::listData(Sources::model()->findAll('validate=0'),'id', 'name'),
        ),
        array(
            'header'=>'客户状态',
            'name'=>'validate',
            'value' =>'$data->ValidateName',
            'filter'=>$model->ValidateArr,
        ),
        array(
            'header'=>'销售人员',
            'name'=>'xiaoshou',
            'value' => '$data->ClientOne->AdminsOne->realname',
            'filter'=>CHtml::listData($aa, 'userid', 'realname'),
            'visible'=>Yii::app()->controller->module->getComponent('user')->post!=3
        ),
        array(
            'header'=>'订单总金额',
            'name'=>'ddzh',
            'value' => '$data->ClientOne->prcie_total',
            // 'filter'=>CHtml::listData(Record::model()->findAll('validate=1 and type=2'),'id', 'title'),
        ),
        // array(
        //     'header'=>'添加人员',
        //     'name'=>'entry',
        //     'value' => '$data->ClientOne->LuruOne->realname',
        //     'filter'=>CHtml::listData($aa,'userid', 'realname'),
        //     // 'filter'=>CHtml::listData(Admins::model()->findAll("site_id=132"),'id', 'realname'),
        //     'visible'=>Yii::app()->controller->module->getComponent('user')->post!=3
        // ),
        array(
            'header'=>'合同编号',
            'name'=>'htbh',
            'value' => '$data->ClientOne->contract_code',
            // 'filter'=>CHtml::listData(Record::model()->findAll('validate=1 and type=2'),'id', 'title'),
        ),

        array(
            'header'=>'最近更新时间',
            'name'=>'ClientOne.update_time',
            'value'=>'date("Y-m-d h:i:s",$data->ClientOne->update_time)',
        ),
		// 'create_time',
	),
)); ?>
<script type="text/javascript">
    /*<![CDATA[*/
    var deleteAll = function (){
        var data=new Array();
        $("input:checkbox[name='selectdel[]']").each(function (){
			if($(this).attr("checked")=="checked"){
                data.push($(this).val());
            }
        });
        if(data.length > 0){
            $.post('/srbac/change-client/delall',{'selectdel[]':data}, function (data) {
            	var json = eval('(' + data + ')'); 
        	    if(json.statu == 0){
        	    	var length = $("input:checked").length;
        	    	for(var i=0;i<=length;i++){
        	    		$("input:checked").eq(i).parent().parent().hide();
        	    	}
					ymPrompt.succeedInfo("删除成功");
				}else{
					ymPrompt.succeedInfo("删除失败");
				}
            });
        }else{
        	ymPrompt.errorInfo('请选择要删除的关键字');
        }
    }
    /*]]>*/
</script>