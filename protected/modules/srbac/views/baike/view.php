<?php
/* @var $this BaikeController */
/* @var $model Baike */

$this->breadcrumbs=array(
	'茶百科'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'茶百科列表', 'url'=>array('index')),
	array('label'=>'创建茶百科', 'url'=>array('create')),
	array('label'=>'修改茶百科', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'删除茶百科', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理茶百科', 'url'=>array('admin')),
);
?>

<h1>显示茶百科 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'cateId',
		'keywords',
		'create_time',
		'des',
		'click',
		'img',
		'content',
		'status',
		'source',
	),
)); ?>
