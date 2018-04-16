<?php
/* @var $this LyglController */
/* @var $model Sources */

$this->breadcrumbs=array(
	'客户来源表'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'添加客户来源', 'url'=>array('create')),
	array('label'=>'修改客户来源', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'管理客户来源', 'url'=>array('admin')),
);
?>

<h1>显示客户来源</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		'createtime',
	),
)); ?>
