<?php
/* @var $this TongjicxController */
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

<h1>统计查询</h1>
<div style="float:left; line-height:22px;  font-size: 12px;margin-right:5px;color:red;">
	<a style="color:rgb(0, 153, 204)" href="/srbac/tongjicx/admin">今天</a>
	&nbsp;&nbsp;&nbsp;<a style="color:rgb(0, 153, 204)" href="/srbac/tongjicx/admin/day/1">前2天</a>
	&nbsp;&nbsp;&nbsp;<a style="color:rgb(0, 153, 204)" href="/srbac/tongjicx/admin/day/2">前3天</a>
	&nbsp;&nbsp;&nbsp;
	<a style="color:rgb(0, 153, 204)" href="/srbac/tongjicx/admin/day/7">一周</a>&nbsp;&nbsp;&nbsp;
	<a style="color:rgb(0, 153, 204)" href="/srbac/tongjicx/admin/day/30">一个月</a>&nbsp;&nbsp;&nbsp;
	<a style="color:rgb(0, 153, 204)" href="/srbac/tongjicx/admin/day/365">一年</a><br/>
当前查询时间：从&nbsp;&nbsp;<?php echo date('Y-m-d H:i:s',$pstarttime).'&nbsp;&nbsp;到&nbsp;&nbsp;'.date('Y-m-d H:i:s',$pstoptime);?>

</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'client-grid',
	'dataProvider'=>$model->searchcx($pstarttime,$pstoptime),
	'columns'=>array(
		'contact',
		'bride',
		array(
            'header'=>'新人手机',
            'name'=>'bride_phone',
        ),
		// 'name',
		// array(
  //           'header'=>'爱人手机',
  //           'name'=>'phone',
  //       ),
		array(
            'header'=>'信息来源',
            'name'=>'source',
            'value'=>'$data->SourceOne->name',
        ),
		'remarks',
		array(
            'header'=>'预约到店时间',
            'name'=>'eserve_time',
            'value'=>'$data->timetodate($data->eserve_time)',
        ),
		array(
            'header'=>'创建时间',
            'name'=>'create_time',
            'value'=>'$data->timetodate($data->create_time)',
        ),
		array(
			'header'=>'联系记录1',
			'value'=>'$data->checklianxi(0)',
			'htmlOptions'=>array('style'=>'text-align:center; width:60px;'),
		),
		array(
			'header'=>'联系记录2',
			'value'=>'$data->checklianxi(1)',
			'htmlOptions'=>array('style'=>'text-align:center; width:60px;'),
		),
		array(
			'header'=>'联系记录3',
			'value'=>'$data->checklianxi(2)',
			'htmlOptions'=>array('style'=>'text-align:center; width:60px;'),
		),
		array(
			'header'=>'联系记录4',
			'value'=>'$data->checklianxi(3)',
			'htmlOptions'=>array('style'=>'text-align:center; width:60px;'),
		),
		array(
			'header'=>'联系记录5',
			'value'=>'$data->checklianxi(4)',
			'htmlOptions'=>array('style'=>'text-align:center; width:60px;'),
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
            $.post('http://www.crm.com/srbac/client/delall',{'selectdel[]':data}, function (data) {
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