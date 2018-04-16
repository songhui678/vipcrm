<?php
/* @var $this LbglController */
/* @var $model Cate */

$this->breadcrumbs=array(
	'分类'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'分类列表', 'url'=>array('index')),
	array('label'=>'创建分类', 'url'=>array('create')),
	array('label'=>'修改分类', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'删除分类', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理分类', 'url'=>array('admin')),
);
?>

<h1>显示分类 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'create_time',
		'status',
		'sort',
		'img',
		'pid',
		'type',
		'con',
		'title',
		'des',
		'keywords',
	),
)); ?>
