<?php
/* @var $this BmglController */
/* @var $model Department */

$this->breadcrumbs=array(
	'部门表'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'添加新部门', 'url'=>array('create')),
	array('label'=>'修改部门信息', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'部门管理', 'url'=>array('admin')),
);
?>

<h1>显示部门信息</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		'create_time',
	),
)); ?>
