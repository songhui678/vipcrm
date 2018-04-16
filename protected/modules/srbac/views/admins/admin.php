<?php
/* @var $this AdminsController */
/* @var $model Admins */

$this->breadcrumbs=array(
	'Admins'=>array('index'),
	'管理',
);

$this->menu=array(
	array('label'=>'添加新用户', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
	$('#admins-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>用户管理</h1>
<!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'admins-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		// 'userid',
		'username',
        'realname',
        array(
            'name'=>'sex',
            'value'=>'$data->sexName',
            'filter'=>Admins::model()->sexList,
        ),
        array(
            'name'=>'dep_id',
            'value'=>'$data->depName',
            'filter'=>Admins::model()->depList,
        ),
        array(
            'name'=>'post',
            'value'=>'$data->postName',
            'filter'=>Admins::model()->postList,
        ),
         array(
            'header'=>'省份',
            'name'=>'area',
            'value'=>'$data->ProvinceOne?$data->ProvinceOne->province_name:"无"',
            'visible'=>Yii::app()->controller->module->getComponent('user')->__id==1,
        ),
		// 'password',
		'ip',

        array(
            'name'=>'validate',
            'value'=>'$data->colorStatusName',
            'filter'=>Admins::model()->statusList,
             'type'=>'raw', 
        ),

		'createtime',
        'remark',
		array(
        'class'=>'CButtonColumn',
        'template'=>'{xianshi} {bianji} {shanchu} {huifu}',//
        'htmlOptions' => array(
        'style'=>'width:100px; text-align:center;'
      ),


      'buttons'=>array
        (
          'xianshi' => array
            (
                'label'=>'显示',
                'url'=>'Yii::app()->createUrl("/".Yii::app()->controller->module->name."/".Yii::app()->controller->id."/view", array("id"=>$data->userid))',
            ),
            'bianji' => array
            (
                'label'=>'编辑',
                'url'=>'Yii::app()->createUrl("/".Yii::app()->controller->module->name."/".Yii::app()->controller->id."/update", array("id"=>$data->userid))',
            ),
            'shanchu' => array
            (
                'label'=>'删除',
                'url'=>'Yii::app()->createUrl("/".Yii::app()->controller->module->name."/".Yii::app()->controller->id."/del", array("id"=>$data->userid))',
                'visible'=>'$data->validate==1',
            ),
            'huifu' => array
            (
                'label'=>'恢复',
                'url'=>'Yii::app()->createUrl("/".Yii::app()->controller->module->name."/".Yii::app()->controller->id."/del", array("id"=>$data->userid))',
                'visible'=>'$data->validate==2',
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
            $.post('/srbac/admins/delall',{'selectdel[]':data}, function (data) {
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
        	ymPrompt.errorInfo('请选择要删除的用户');
        }
    }
    /*]]>*/
</script>