<?php
/* @var $this LxjlController */
/* @var $model Record */

$this->breadcrumbs=array(
	'Records'=>array('index'),
	'管理',
);

$this->menu=array(
	array('label'=>'添加新联系状态', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
	$('#record-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>管理联系状态</h1>
<!-- search-form -->
提醒：勿轻易删除联系状态，对查询客户联系状态会有一定的影响
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'record-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        array(
			'id'=>'id', 
            'selectableRows' => 2,
            'footer' => '<button type="button" onclick="deleteAll();" style="width:50px">删除</button>',
            'class' => 'CCheckBoxColumn',
            'headerHtmlOptions' => array('width'=>'33px'),
            'checkBoxHtmlOptions' => array('name' => 'selectdel[]'),
            'htmlOptions'=>array('style'=>'text-align:center; width:50px;')
        ),
		'title',
		array(
            'header'=>'类型',
            'name'=>'type',
            'value'=>'$data->typeName',
            'filter'=>$model->typeArr,
        ),
		array(
            'header'=>'状态',
            'name'=>'validate',
            'value'=>'$data->statusName',
            'filter'=>$model->statusArr,
        ),
        array(
            'header'=>'站点',
            'name'=>'site_id',
            'filter'=>CHtml::listData(Admins::model()->findAll('post=1 and validate=1'),'site_id', 'realname'),
            'visible'=>Yii::app()->controller->module->getComponent('user')->__id==1,
        ),
		
		'sort',
		array(
      'class'=>'CButtonColumn',
      'template'=>'{xianshi} {bianji} {shanchu} {huihu}',
      'htmlOptions' => array(
        'style'=>'width:100px; text-align:center;'
      ),
      'buttons'=>array
        (
          'xianshi' => array
            (
                'label'=>'显示',
                'url'=>'Yii::app()->createUrl("/".Yii::app()->controller->module->name."/".Yii::app()->controller->id."/view", array("id"=>$data->id))',
            ),
            'bianji' => array
            (
                'label'=>'编辑',
                'url'=>'Yii::app()->createUrl("/".Yii::app()->controller->module->name."/".Yii::app()->controller->id."/update", array("id"=>$data->id))',
            ),
            'shanchu' => array
            (
                'label'=>'恢复',
                'url'=>'Yii::app()->createUrl("/".Yii::app()->controller->module->name."/".Yii::app()->controller->id."/delete", array("id"=>$data->id))',
                'visible'=>'$data->validate==0',
            ),
            'huihu' => array
            (
                'label'=>'删除',
                'url'=>'Yii::app()->createUrl("/".Yii::app()->controller->module->name."/".Yii::app()->controller->id."/delete", array("id"=>$data->id))',
                'visible'=>'$data->validate==1',
            ),
        ),
      ),
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
            $.post('/srbac/lxjl/delall',{'selectdel[]':data}, function (data) {
            	var json = eval('(' + data + ')'); 
        	    if(json.statu == 0){
        	    	var length = $("input:checked").length;
        	    	for(var i=0;i<=length;i++){
        	    		$("input:checked").eq(i).parent().parent().hide();
        	    	}
					ymPrompt.succeedInfo("删除成功");
                    window.location.reload();

				}else{
					ymPrompt.succeedInfo("删除失败");
				}
            });
        }else{
        	ymPrompt.errorInfo('请选择要删除的记录');
        }
    }
    /*]]>*/
</script>