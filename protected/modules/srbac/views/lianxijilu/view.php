<?php
/* @var $this LianxijiluController */
/* @var $model ContactRecord */

$this->breadcrumbs=array(
	'联系记录'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'联系记录列表', 'url'=>array('index')),
	array('label'=>'创建联系记录', 'url'=>array('create')),
	array('label'=>'修改联系记录', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'删除联系记录', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理联系记录', 'url'=>array('admin')),
);
?>

<h1>显示联系记录 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'client_id',
		'contact_time',
		'content',
		'personnel',
		'result',
		'remark',
	),
)); ?>
