<?php
/* @var $this LyglController */
/* @var $model Sources */

$this->breadcrumbs=array(
	'Sources'=>array('index'),
	'管理',
);

$this->menu=array(
	array('label'=>'添加客户来源', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
	$('#sources-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>客户来源管理</h1>
<!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'sources-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'name',
		'createtime',
        array(
            'header'=>'是否有效',
            'name'=>'validate',
            'value'=>'$data->ValidateName',
            'filter'=>$model->ValidateArr,
        ),
        array(
            'header'=>'站点',
            'name'=>'site_id',
            'value'=>'$data->AdminsOne?$data->AdminsOne->realname:"无"',
            'filter'=>CHtml::listData(Admins::model()->findAll('post=1 and validate=1'),'site_id', 'realname'),
            'visible'=>Yii::app()->controller->module->getComponent('user')->__id==1,
        ),
		array(
      'class'=>'CButtonColumn',
      'template'=>'{xianshi} {bianji}',
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
            $.post('http://www.crm.com/srbac/sources/delall',{'selectdel[]':data}, function (data) {
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
        	ymPrompt.errorInfo('请选择要删除的记录');
        }
    }
    /*]]>*/
</script>