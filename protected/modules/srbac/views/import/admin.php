<?php
/* @var $this ImportController */
/* @var $model ImportFile */

$this->breadcrumbs=array(
	'Import Files'=>array('index'),
	'管理',
);

$this->menu=array(
	array('label'=>'上传数据表', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
	$('#import-file-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>管理数据文件表 <?php if(Yii::app()->controller->module->getComponent('user')->post==1){?><a href="/srbac/import/daoccvs">全部导出</a><?php } ?>&nbsp;<a href="/fanben.xls">下载批量上传数据的文件范本</a></h1>
<!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'import-file-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		// 'adminOne.realname',
		// 'file',
        'createtime',
		'title',
        array(
            'header'=>'是否导入',
            'name'=>'status',
            'value'=>'$data->StatusName',
            'filter'=>$model->StatusArr,
        ),
		// 'site_id',
		array(
       'header'=>'操作',   
      'class'=>'CButtonColumn',
      'template'=>'{daoru} {chakan} {nopipei}',
      'htmlOptions' => array(
        'style'=>'width:100px; text-align:center;'
      ),
      'buttons'=>array
        (
          // 'xianshi' => array
          //   (
          //       'label'=>'显示',
          //       'url'=>'Yii::app()->createUrl("/".Yii::app()->controller->module->name."/".Yii::app()->controller->id."/view", array("id"=>$data->id))',
          //   ),
          //   
            'daoru' => array
            (
                'label'=>'导入',
                'url'=>'Yii::app()->createUrl("/".Yii::app()->controller->module->name."/".Yii::app()->controller->id."/import", array("id"=>$data->id))',
                'visible'=>'$data->status==0',
            ),
            'chakan' => array
            (
                'label'=>'查看相同',
                'url'=>'Yii::app()->createUrl("/".Yii::app()->controller->module->name."/".Yii::app()->controller->id."/searchsame", array("id"=>$data->id))',
                'visible'=>'$data->status==1',
            ),
            'nopipei' => array
            (
                'label'=>'不符合',
                'url'=>'Yii::app()->createUrl("/".Yii::app()->controller->module->name."/".Yii::app()->controller->id."/mismatching", array("id"=>$data->id))',
                'visible'=>'$data->status==1',
            ),
            // 'bianji' => array
            // (
            //     'label'=>'编辑',
            //     'url'=>'Yii::app()->createUrl("/".Yii::app()->controller->module->name."/".Yii::app()->controller->id."/update", array("id"=>$data->id))',
            // ),
            // 'shanchu' => array
            // (
            //     'label'=>'删除',
            //     'url'=>'Yii::app()->createUrl("/".Yii::app()->controller->module->name."/".Yii::app()->controller->id."/delete", array("id"=>$data->id))',
            // ),
        ),
      ),
	),
)); ?>