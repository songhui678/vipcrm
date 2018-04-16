<?php
/* @var $this LxjlController */
/* @var $model Record */

$this->breadcrumbs=array(
	'联系状态'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'添加新联系状态', 'url'=>array('create')),
	array('label'=>'修改联系状态', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'联系状态管理', 'url'=>array('admin')),
);
?>

<h1>显示联系状态信息</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'title',
		array(
			'header'=>'类型',
			'name'=>'type',
			'value'=>$model->TypeName,
		),
		array(
			'header'=>'是否有效',
			'name'=>'validate',
			'value'=>$model->StatusName,
		),
		'sort',
	),
)); ?>
