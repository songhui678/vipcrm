<?php
/* @var $this KehuController */
/* @var $model Client */

$this->breadcrumbs=array(
	'Clients'=>array('index'),
	'管理',
);

$this->menu=array(
);

Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
	$('#client-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>部门统计</h1>
<!-- search-form -->
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'client-grid',
	'dataProvider'=>$model->searchbmtj($starttime,$stoptime,$type,$st,$arr),
    'emptyText'=>'没有找到数据.',
	'columns'=>array(
        array(
              'header'=>'新娘',
              'name'=>'bride',
              'type'=>'raw',
              // 'value'=>'CHtml::link($data->bride,"/srbac/kehu/lianxi/id/".$data->id,array("target"=>"_blank","title"=>"查看详细"))',
        ),
        array(
            'header'=>'新娘手机号',
            'name'=>'bride_phone',
            'htmlOptions'=>array('style'=>'text-align:center; width:50px;','oncontextmenu'=>'return false;','oncopy'=>'return false;','oncut'=>'return false;',),
            
        ),
        array(
              'header'=>'新郎',
              'name'=>'name',
              'type'=>'raw',
              'value'=>'CHtml::link($data->name,"/srbac/kehu/lianxi/id/".$data->id,array("target"=>"_blank","title"=>"查看详细"))',
        ),
        array(
            'header'=>'新郎手机号',
            'name'=>'phone',
            'htmlOptions'=>array('style'=>'text-align:center; width:50px;','oncontextmenu'=>'return false;','oncopy'=>'return false;','oncut'=>'return false;',),
            
        ),
        array(
            'header'=>'最后更新时间',
            'name'=>'update_time',
            'value'=>'$data->timetodate($data->update_time)',
            'filter'=> $model->checkupdatetime,
        ),
        array(
            'header'=>'客户状态',
            'name'=>'status',
            'value'=>'$data->statussName',
            'filter'=>$model->statusArr,
            'type'=>'raw',  
        ),
        array(
            'header'=>'市场部联系情况',
            'name'=>'situation',
            'value'=>'$data->SRecordOne?$data->SRecordOne->title:"无"',
            'filter'=>CHtml::listData(Record::model()->findAll('validate=1 and type=1'),'id', 'title'),
            'visible'=>Yii::app()->controller->module->getComponent('user')->type==1||Yii::app()->controller->module->getComponent('user')->post==1||Yii::app()->controller->module->getComponent('user')->post==4
        ),
        array(
            'header'=>'销售部联系情况',
            'name'=>'xsituation',
            'value'=>'$data->XRecordOne?$data->XRecordOne->title:"无"',
            'filter'=>CHtml::listData(Record::model()->findAll('validate=1 and type=2'),'id', 'title'),
            'visible'=>Yii::app()->controller->module->getComponent('user')->type==2||Yii::app()->controller->module->getComponent('user')->post==1||Yii::app()->controller->module->getComponent('user')->post==4
        ),
        array(
            'header'=>'录入状态',
            'name'=>'entry_status',
            'value'=>'$data->EntrystatusName',
            'filter'=>$model->EntrystatusArr,
            'visible'=>Yii::app()->controller->module->getComponent('user')->post==1||Yii::app()->controller->module->getComponent('user')->post==4
            ),
        array(
            'header'=>'站点',
            'name'=>'site_id',
            'value'=>'$data->SiteOne?$data->SiteOne->realname:"无"',
            'filter'=>CHtml::listData(Admins::model()->findAll('post=1 and validate=1'),'site_id', 'realname'),
            'visible'=>Yii::app()->controller->module->getComponent('user')->__id==1,
        ),
        array(
            'header'=>'省份',
            'name'=>'province',
            'value'=>'$data->ProvinceOne?$data->ProvinceOne->province_name:"无"',
            'visible'=>Yii::app()->controller->module->getComponent('user')->__id==1,
            'htmlOptions'=>array('style'=>'text-align:center; width:40px;'),
            'filter'=>false,
        ),
        array(
            'header'=>'业务人员',
            'name'=>'usiness',
            'value'=>'$data->contact',
            'filter'=>CHtml::listData(Admins::model()->findAll('site_id=:site_id and validate=1',array(':site_id'=>Yii::app()->controller->module->getComponent('user')->site_id)), 'userid', 'realname'),
            'visible'=>Yii::app()->controller->module->getComponent('user')->post!=3,
        ),
    ),
)); ?>
