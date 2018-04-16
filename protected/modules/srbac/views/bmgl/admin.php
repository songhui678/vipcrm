<?php
/* @var $this BmglController */
/* @var $model Department */

$this->breadcrumbs=array(
	'Departments'=>array('index'),
	'管理',
);

$this->menu=array(
	array('label'=>'添加新部门', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
	$('#department-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>管理部门表</h1>
<!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'department-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
// array(
// 			'id'=>'id', 
//             'selectableRows' => 2,
//             'footer' => '<button type="button" onclick="deleteAll();" style="width:50px">删除</button>',
//             'class' => 'CCheckBoxColumn',
//             'headerHtmlOptions' => array('width'=>'33px'),
//             'checkBoxHtmlOptions' => array('name' => 'selectdel[]'),
//             'htmlOptions'=>array('style'=>'text-align:center; width:50px;')
//         ),
		'name',
		'create_time',
		// 'site_id',
		// 'validate',
		array(
      'class'=>'CButtonColumn',
      'template'=>'{xianshi} {bianji} {shanchu}',
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
                'label'=>'删除',
                'url'=>'Yii::app()->createUrl("/".Yii::app()->controller->module->name."/".Yii::app()->controller->id."/delete", array("id"=>$data->id))',
                'click'=>'
                        function(){
                            var th = $(this);
                            var href = th.attr("href");
                            $.get(href,
                                    function(data){
                                        if(data.statu == 1){
                                            ymPrompt.succeedInfo("删除成功");
                                            window.location.reload();
                                        }else{
                                            ymPrompt.succeedInfo(data.statu);
                                        }
                                    }, "json");
                                return false;
                        }
                ',
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
            $.post('/srbac/department/delall',{'selectdel[]':data}, function (data) {
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