<?php
/* @var $this BaikeCateController */
/* @var $model BaikeCate */

$this->breadcrumbs=array(
	'茶百科分类'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'茶百科分类列表', 'url'=>array('index')),
	array('label'=>'创建茶百科分类', 'url'=>array('create')),
	array('label'=>'修改茶百科分类', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'删除茶百科分类', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理茶百科分类', 'url'=>array('admin')),
);
?>

<h1>显示茶百科分类 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'create_time',
		'status',
		'sort',
		'url',
	),
)); ?>
