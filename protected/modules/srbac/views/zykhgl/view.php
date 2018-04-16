<?php
/* @var $this ZykhglController */
/* @var $model ChangeClient */

$this->breadcrumbs=array(
	'转移客户表'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'转移客户表列表', 'url'=>array('index')),
	array('label'=>'创建转移客户表', 'url'=>array('create')),
	array('label'=>'修改转移客户表', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'删除转移客户表', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理转移客户表', 'url'=>array('admin')),
);
?>

<h1>显示转移客户表 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'clientid',
		'site_id',
		'dep_id',
		'status',
		'create_time',
	),
)); ?>
