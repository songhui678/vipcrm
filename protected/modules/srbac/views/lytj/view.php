<?php
/* @var $this LytjController */
/* @var $model Sources */

$this->breadcrumbs=array(
	'客户来源表'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'客户来源表列表', 'url'=>array('index')),
	array('label'=>'创建客户来源表', 'url'=>array('create')),
	array('label'=>'修改客户来源表', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'删除客户来源表', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理客户来源表', 'url'=>array('admin')),
);
?>

<h1>显示客户来源表 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'createtime',
		'validate',
		'site_id',
	),
)); ?>
