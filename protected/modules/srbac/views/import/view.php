<?php
/* @var $this ImportController */
/* @var $model ImportFile */

$this->breadcrumbs=array(
	'数据文件表'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'数据文件表列表', 'url'=>array('index')),
	array('label'=>'创建数据文件表', 'url'=>array('create')),
	array('label'=>'修改数据文件表', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'删除数据文件表', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理数据文件表', 'url'=>array('admin')),
);
?>

<h1>显示数据文件表 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'userid',
		'file',
		'title',
		'status',
		'site_id',
	),
)); ?>
