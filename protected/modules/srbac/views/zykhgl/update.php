<?php
/* @var $this ZykhglController */
/* @var $model ChangeClient */

$this->breadcrumbs=array(
	'转移客户表'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'转移客户表列表', 'url'=>array('index')),
	array('label'=>'创建转移客户表', 'url'=>array('create')),
	array('label'=>'显示转移客户表', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'管理转移客户表', 'url'=>array('admin')),
);
?>

<h1>修改转移客户表 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>