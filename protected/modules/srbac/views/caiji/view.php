<?php
/* @var $this CaijiController */
/* @var $model Caiji */

$this->breadcrumbs=array(
	'采集列表'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'采集列表列表', 'url'=>array('index')),
	array('label'=>'创建采集列表', 'url'=>array('create')),
	array('label'=>'修改采集列表', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'删除采集列表', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理采集列表', 'url'=>array('admin')),
);
?>

<h1>显示采集列表 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'url',
		'status',
		'type',
		'start_page',
		'stop_page',
		'cate_id',
		'laiyuan',
		'code',
		'cate_name',
		'bianma',
		'img_path',
		'host',
		'guize_id',
		'caiji_time',
	),
)); ?>
