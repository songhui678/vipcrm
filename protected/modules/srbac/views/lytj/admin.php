<?php
/* @var $this LytjController */
/* @var $model Sources */

$this->breadcrumbs=array(
	'Sources'=>array('index'),
	'管理',
);

// $this->menu=array(
// 	array('label'=>'客户来源表列表', 'url'=>array('index')),
// 	array('label'=>'创建客户来源表', 'url'=>array('create')),
// );

// Yii::app()->clientScript->registerScript('search', "
// $('.search-button').click(function(){
// 	$('.search-form').toggle();
// 	return false;
// });
// $('.search-form form').submit(function(){
// 	$('#sources-grid').yiiGridView('update', {
// 		data: $(this).serialize()
// 	});
// 	return false;
// });
// ");
?>

<h1>管理客户来源表</h1>




</div><!-- search-form -->
<?php 
    $arr[]=array(
            'header'=>'<span style="color:red">来源</span>',
            'name'=>'name',
            'filter'=>false,
            'type'=>'raw', 
        );
    $arr[1]=array(
            'header'=>'<span style="color:#272822">尚未联系</span>',
            //'name'=>'name',
            'value'=>'$data->getTongji("kong",1)',
            'filter'=>false,
            'type'=>'raw', 
        );

    $modelshichang=Record::model()->findAll(array("condition"=>"validate=1 and type=1",'order'=>'sort asc'));
    foreach ($modelshichang as $key => $value) {

            $arr[$key+3]=array(
                'header'=>'<span style="color:#272822">'.$value->title.'</span>',
                'name'=>'id',
                'value'=>'$data->getTongji('.$value->id.','.$value->type.')',
                'filter'=>false,
                'type'=>'raw', 
            );
    }
    $arr[count($modelshichang)+4]=array(
            'header'=>'<span style="color:#272822">市场统计</span>',
            'name'=>'id',
            'value'=>'$data->getTongji("zongji",1)',
            'filter'=>false,
             'type'=>'raw', 
        );
    $arr[count($modelshichang)+5]=array(
            'header'=>'<span>尚未联系</span>',
            //'name'=>'name',
            'value'=>'$data->getTongji("kong",2)',
            'filter'=>false,
            'type'=>'raw', 
        );

    $modelxiaoshou=Record::model()->findAll(array("condition"=>"validate=1 and type=2",'order'=>'sort asc'));
    foreach ($modelxiaoshou as $key1 => $value1) {

            $arr[count($modelxiaoshou)+$key1+5]=array(
                'header'=>$value1->title,
                'name'=>'id',
                'value'=>'$data->getTongji('.$value1->id.','.$value1->type.')',
                'filter'=>false,
                'type'=>'raw', 
            );
    }
    $arr[count($modelxiaoshou)+count($modelshichang)+7]=array(
            'header'=>'<span>销售统计</span>',
            'name'=>'id',
            'value'=>'$data->getTongji("zongji",2)',
            'filter'=>false,
             'type'=>'raw', 
        );
  

  ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'sources-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'columns'=>$arr,
	 // 'columns'=>array(
      
 //   //      array(
	// 		// 'id'=>'id', 
 //   //          'selectableRows' => 2,
 //   //          'footer' => '<button type="button" onclick="deleteAll();" style="width:50px">删除</button>',
 //   //          'class' => 'CCheckBoxColumn',
 //   //          'headerHtmlOptions' => array('width'=>'33px'),
 //   //          'checkBoxHtmlOptions' => array('name' => 'selectdel[]'),
 //   //          'htmlOptions'=>array('style'=>'text-align:center; width:50px;')
 //   //      ),
 //        array(
 //            'header'=>'来源',
 //            'name'=>'name',
          
 //            'filter'=>false,
 //             'type'=>'raw', 
 //        ),
 //        $arr,
	// 	'createtime',
	// 	'validate',
	// 	'site_id',
 //        // array(
 //        //     'class'=>'CButtonColumn',
 //        //     'template'=>'{xianshi} {bianji} {shanchu}',
 //        //     'htmlOptions' => array(
 //        //     'style'=>'width:100px; text-align:center;'
 //        //     ),
 //        //     'buttons'=>array
 //        //     (
 //        //       'xianshi' => array
 //        //         (
 //        //             'label'=>'显示',
 //        //             'url'=>'Yii::app()->createUrl("/".Yii::app()->controller->module->name."/".Yii::app()->controller->id."/view", array("id"=>$data->id))',
 //        //         ),
 //        //         'bianji' => array
 //        //         (
 //        //             'label'=>'编辑',
 //        //             'url'=>'Yii::app()->createUrl("/".Yii::app()->controller->module->name."/".Yii::app()->controller->id."/update", array("id"=>$data->id))',
 //        //         ),
 //        //         'shanchu' => array
 //        //         (
 //        //             'label'=>'删除',
 //        //             'url'=>'Yii::app()->createUrl("/".Yii::app()->controller->module->name."/".Yii::app()->controller->id."/delete", array("id"=>$data->id))',
 //        //         ),
 //        //     ),
 //        // ),
	// ),
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
            $.post('http://www.vipcrm.com/srbac/sources/delall',{'selectdel[]':data}, function (data) {
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