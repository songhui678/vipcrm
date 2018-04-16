<?php
/* @var $this TongjiController */
/* @var $model Client */

$this->breadcrumbs=array(
	'客户表'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'客户表列表', 'url'=>array('index')),
	array('label'=>'创建客户表', 'url'=>array('create')),
	array('label'=>'显示客户表', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'管理客户表', 'url'=>array('admin')),
);
?>

<h1>修改客户表 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>