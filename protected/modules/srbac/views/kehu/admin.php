<?php
/* @var $this KehuController */
/* @var $model Client */

$this->breadcrumbs=array(
	'Clients'=>array('index'),
	'管理',
);

$this->menu=array(
	array('label'=>'添加新客户', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#client-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>管理客户表</h1>
<?php echo CHtml::link('高级搜索(点击可以打开或关闭)','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'client-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    // 'ajaxUpdate'=>false,    //禁用AJAX
    'emptyText'=>'没有找到数据.',
	'columns'=>array(
        array(
			'id'=>'id', 
            'selectableRows' => 2,
            'footer' => '<button type="button" onclick="shuaxinAll();" style="width:50px">刷新</button>&nbsp;<button type="button" onclick="deleteAll();" style="width:50px">删除</button>&nbsp;<button type="button" onclick="huifuAll();" style="width:50px">恢复</button>&nbsp;&nbsp;<select style="display:none;" name="change" id="change" ></select>',
            'class' => 'CCheckBoxColumn',

            // 'headerHtmlOptions' => array('width'=>'33px'),
            'footerHtmlOptions'=>array('colspan'=>'4'), 
            'checkBoxHtmlOptions' => array('name' => 'selectdel[]'),
            'htmlOptions'=>array('style'=>'text-align:center; width:15px;','class'=>'tx')
        ),
        array(
              'header'=>'新人',
              'name'=>'bride',
              'type'=>'raw',
              'value'=>'CHtml::link($data->bride,"/srbac/kehu/lianxi/id/".$data->id,array("target"=>"_blank","title"=>"查看详细"))',
              'htmlOptions'=>array('style'=>'text-align:center; width:40px;'),
        ),
        array(
            'header'=>'新人手机',
            'name'=>'bride_phone',
            'htmlOptions'=>array('style'=>'text-align:center; width:50px;','oncontextmenu'=>'return false;','oncopy'=>'return false;','oncut'=>'return false;',),
            
        ),
        // array(
        //       'header'=>'爱人',
        //       'name'=>'name',
        //       'type'=>'raw',
        //       'value'=>'CHtml::link($data->name,"/srbac/kehu/lianxi/id/".$data->id,array("target"=>"_blank","title"=>"查看详细"))',
        //       'htmlOptions'=>array('style'=>'text-align:center; width:40px;'),
        // ),
        // array(
        //     'header'=>'爱人手机',
        //     'name'=>'phone',
        //     'htmlOptions'=>array('style'=>'text-align:center; width:50px;','oncontextmenu'=>'return false;','oncopy'=>'return false;','oncut'=>'return false;',),  
        // ),
        array(
            'header'=>'最后联系时间',
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
            'header'=>'来源',
            'name'=>'source',
            'value'=>'$data->SourceOne?$data->SourceOne->name:""',
            'filter'=>CHtml::listData(Sources::model()->findAll('validate=0'),'id', 'name'),
        ),
        array(
            'header'=>'市场状态',
            'name'=>'situation',
            'value'=>'$data->SRecordOne?$data->SRecordOne->title:"无"',
            'filter'=>CHtml::listData(Record::model()->findAll('validate=1 and type=1'),'id', 'title'),
            'visible'=>Yii::app()->controller->module->getComponent('user')->type==1||Yii::app()->controller->module->getComponent('user')->post==1||Yii::app()->controller->module->getComponent('user')->post==4,
        ),
        array(
            'header'=>'销售状态',
            'name'=>'xsituation',
            'value'=>'$data->XRecordOne?$data->XRecordOne->title:"无"',
            'filter'=>CHtml::listData(Record::model()->findAll('validate=1 and type=2'),'id', 'title'),
            'visible'=>Yii::app()->controller->module->getComponent('user')->type==2||Yii::app()->controller->module->getComponent('user')->post==1||Yii::app()->controller->module->getComponent('user')->post==4
        ),
        // array(
        //     'header'=>'录入状态',
        //     'name'=>'entry_status',
        //     'value'=>'$data->EntrystatusName',
        //     'filter'=>$model->EntrystatusArr,
        //     'visible'=>Yii::app()->controller->module->getComponent('user')->post==1||Yii::app()->controller->module->getComponent('user')->post==4
        //     ),
       
        array(
            'header'=>'当前状态',
            'name'=>'dangqian',
            'value'=>'$data->DangqianName',
            'filter'=>$model->DangqianArr,
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
        // 'entry_status',
        // 'entry',
        // 'usiness',
        array(
            'header'=>'业务人员',
            'name'=>'usiness',
            'value'=>'$data->contact',
            'filter'=>CHtml::listData(Admins::model()->findAll('site_id=:site_id and validate=1',array(':site_id'=>Yii::app()->controller->module->getComponent('user')->site_id)), 'userid', 'realname'),
            'visible'=>Yii::app()->controller->module->getComponent('user')->post!=3,
        ),
        // array(
        //         'class' => 'phaSelectColumn',
        //         'header' => '转移业务人员',
        //         'name' => 'AdminsOne.userid',
        //         'value'=>'$data->contact',
        //         'data' => CHtml::listData(Admins::model()->findAll('site_id=:site_id and validate=1',array(':site_id'=>Yii::app()->controller->module->getComponent('user')->site_id)), 'userid', 'realname'),
        //         'actionUrl' => array('setChangeusiness'),
        //         'visible'=>Yii::app()->controller->module->getComponent('user')->post!=3 and Yii::app()->controller->module->getComponent('user')->__id!=1,
        //         'filter'=>CHtml::listData(Admins::model()->findAll('site_id=:site_id and validate=1',array(':site_id'=>Yii::app()->controller->module->getComponent('user')->site_id)), 'userid', 'realname'),
        // ),
        // array(
        //         'class' => 'phaSelectColumn',
        //         'header' => '转移业务人员',
        //         'name' => 'actions',
        //         'value'=>'$data->actions',
        //         // 'data' => CHtml::listData(Admins::model()->findAll('site_id=:site_id and validate=1',array(':site_id'=>Yii::app()->controller->module->getComponent('user')->site_id)), 'userid', 'realname'),
        //         'type'=>'raw',  
        //         'actionUrl' => array('setChangeusiness'),
        //         'visible'=>Yii::app()->controller->module->getComponent('user')->post!=3 and Yii::app()->controller->module->getComponent('user')->__id!=1,
        // //         'filter'=>CHtml::listData(Admins::model()->findAll('site_id=:site_id and validate=1',array(':site_id'=>Yii::app()->controller->module->getComponent('user')->site_id)), 'userid', 'realname'),
        // ),
        array(
            'name' => 'actions',
            'header' => '转移业务人员',
            'value' => '$data->actions',
            'type'=>'raw',  
            'filter' => false,
            'visible'=>Yii::app()->controller->module->getComponent('user')->post!=3 and Yii::app()->controller->module->getComponent('user')->__id!=1,
            'htmlOptions'=>array('style'=>'text-align:center; width:40px;'),
        ),
		array(
        'header'=>'操作',
        'deleteConfirmation'=>"您确定要彻底删除此数据吗？如果删除了就再也找不回来了", 
      'class'=>'CButtonColumn',
      'template'=>'{lianxi} {bianji} {shanchu} {guanbi} {delete}',
      'htmlOptions' => array(
        'style'=>'width:90px; text-align:center;',

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
                // 'visible'=>'$data->status==1',  
            ),
            'lianxi' => array
            (
                'label'=>'显示',
                'url'=>'Yii::app()->createUrl("/".Yii::app()->controller->module->name."/".Yii::app()->controller->id."/lianxi", array("id"=>$data->id))',
                // 'options'=>array('target'=>'_blank'),                
            ),
            'guanbi' => array
            (
                'label'=>"关闭提醒",
                'url'=>'Yii::app()->createUrl("/".Yii::app()->controller->module->name."/".Yii::app()->controller->id."/closeremind", array("id"=>$data->id))',
                'options'=>array('class'=>'tixing','style'=>"color:red"),
                'visible'=>'$data->remind_status==1 || $data->remind_status==2',  
            ),
            'delete' => array
            (
                'label'=>'彻底删除',
                'url'=>'Yii::app()->createUrl("/".Yii::app()->controller->module->name."/".Yii::app()->controller->id."/chedidel", array("id"=>$data->id))',
                'imageUrl'=>false, 
                'visible'=>"Yii::app()->controller->module->getComponent('user')->post==1 or Yii::app()->controller->module->getComponent('user')->post==4", 
            ),


        ),
      ),
	),
)); ?>
<script type="text/javascript">
$(function(){
    $.ajax({
             type: "POST",
             url: "/srbac/kehu/ajaxUsiness",
             success: function(msg){
               $('#change').html(msg);
             }
          });   
}); 

    var xuanze = function (){
        $.ajax({
             type: "POST",
             url: "/srbac/kehu/ajaxUsiness",
             success: function(msg){
                $('#change').html(msg);
                $('#change').show();
             }
          }); 
    }
    /*<![CDATA[*/
    var deleteAll = function (){
        var data=new Array();
        $("input:checkbox[name='selectdel[]']").each(function (){
			if($(this).attr("checked")=="checked"){
                data.push($(this).val());
            }
        });
        if(data.length > 0){
            $.post('/srbac/kehu/delall',{'selectdel[]':data}, function (data) {
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
                    // window.location.reload();
				}
            });
        }else{
        	ymPrompt.errorInfo('请选择要删除的客户');
        }
    }


    $('#change').live('change',function(){
        var data=new Array();
        $("input:checkbox[name='selectdel[]']").each(function (){
            if($(this).attr("checked")=="checked"){
                data.push($(this).val());
            }
        });
        if(data.length > 0){
            txt=$("#change").val();
            if(txt==''){
                alert("还未选择业务人员");
                return false;

            }
            $.post('/srbac/kehu/changeall',{'selectdel[]':data,'name':txt}, function (data) {
                var json = eval('(' + data + ')'); 
                if(json.statu == 0){
                    var length = $("input:checked").length;
                    // for(var i=0;i<=length;i++){
                    //     $("input:checked").eq(i).parent().parent().hide();
                    // }
                    ymPrompt.succeedInfo("调整成功");
                    window.location.reload();
                }else{
                    ymPrompt.succeedInfo("调整失败");
                    // window.location.reload();
                }
           });
        }else{
            ymPrompt.errorInfo('请选择要调整的客户');
        }
    });


    // var changeAll = function (){

    //     var data=new Array();
    //     $("input:checkbox[name='selectdel[]']").each(function (){
    //         if($(this).attr("checked")=="checked"){
    //             data.push($(this).val());
    //         }
    //     });
    //     if(data.length > 0){
    //         txt=$("#change").val();
    //         if(txt==''){
    //             alert("还未选择业务人员");
    //             return false;

    //         }
    //         $.post('/srbac/kehu/changeall',{'selectdel[]':data,'name':txt}, function (data) {
    //             var json = eval('(' + data + ')'); 
    //             if(json.statu == 0){
    //                 var length = $("input:checked").length;
    //                 // for(var i=0;i<=length;i++){
    //                 //     $("input:checked").eq(i).parent().parent().hide();
    //                 // }
    //                 ymPrompt.succeedInfo("调整成功");
    //                 window.location.reload();
    //             }else{
    //                 ymPrompt.succeedInfo("调整失败");
    //                 // window.location.reload();
    //             }
    //        });
    //     }else{
    //         ymPrompt.errorInfo('请选择要调整的客户');
    //     }
    // }

    var fangqiAll = function (){
        var data=new Array();
        $("input:checkbox[name='selectdel[]']").each(function (){
            if($(this).attr("checked")=="checked"){
                data.push($(this).val());
            }
        });
        if(data.length > 0){
            $.post('/srbac/kehu/fangqiall',{'selectdel[]':data}, function (data) {
                var json = eval('(' + data + ')'); 
                if(json.statu == 0){
                    var length = $("input:checked").length;
                    // for(var i=0;i<=length;i++){
                    //     $("input:checked").eq(i).parent().parent().hide();
                    // }
                    ymPrompt.succeedInfo("放弃成功");
                    // window.location.reload();
                }else{
                    ymPrompt.succeedInfo("放弃失败");
                    // window.location.reload();
                }
            });
        }else{
            ymPrompt.errorInfo('请选择要放弃的客户');
        }
    }

    var huifuAll = function (){
        var data=new Array();
        $("input:checkbox[name='selectdel[]']").each(function (){
            if($(this).attr("checked")=="checked"){
                data.push($(this).val());
            }
        });
        if(data.length > 0){
            $.post('/srbac/kehu/huifuall',{'selectdel[]':data}, function (data) {
                var json = eval('(' + data + ')'); 
                if(json.statu == 0){
                    var length = $("input:checked").length;
                    // for(var i=0;i<=length;i++){
                    //     $("input:checked").eq(i).parent().parent().hide();
                    // }
                    ymPrompt.succeedInfo("恢复成功");
                     window.location.reload();
                }else{
                    ymPrompt.succeedInfo("恢复失败");
                    //window.location.reload();
                }
            });
        }else{
            ymPrompt.errorInfo('请选择要恢复的客户');
        }
    }
    var shuaxinAll = function (){
        window.location.reload();

    }


    /*]]>*/
</script>

 <script>
// $(function(){
//     var tixing='';
//     tixing=$('.tixing').parent().parent();
//     tixing.css('color','red');
//     // tixing.find('.tx').prepend('！');
//     $('.tixing').css('color','red');
//     $('.tixing').siblings('a').css('color','red');
    
// });
 </script> 
 <script>
$('document').ready(function(){
    

    var post='<?php echo Yii::app()->controller->module->getComponent('user')->post ?>';
    var userid='<?php echo Yii::app()->controller->module->getComponent('user')->__id ?>';
    if(userid!='1'){
        if(post!='3'){
        $('.tx,#id_all').live('click',function(){
           
           $.ajax({
                 type: "POST",
                 url: "/srbac/kehu/ajaxUsiness",
                 success: function(msg){
                    $('#change').html(msg);
                    $('#change').show();

                 }
              });
           
         });
        }
    }

 

 // $('.myzhuanyi').change(function(){
 //    var uid=$(this).val();
 //    var id=$(this).parent().parent().first().html();
 //    alert(id);
    
 // });
    // $('.tx').click(function(){
    //     alert('a');
    //     $("#change").show();
    // });
});
 </script>
