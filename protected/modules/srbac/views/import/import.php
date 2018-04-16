<?php
/* @var $this ImportController */
/* @var $model ImportFile */

$this->breadcrumbs=array(
	'数据文件表'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'数据文件表列表', 'url'=>array('index')),
	array('label'=>'创建数据文件表', 'url'=>array('create')),
	array('label'=>'显示数据文件表', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'管理数据文件表', 'url'=>array('admin')),
);
?>

<h1>修改数据文件表 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_importform', array('model'=>$model)); ?>