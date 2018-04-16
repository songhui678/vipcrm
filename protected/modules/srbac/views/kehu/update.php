<?php
/* @var $this KehuController */
/* @var $model Client */

$this->breadcrumbs=array(
	'客户表'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'添加新客户', 'url'=>array('create')),
	array('label'=>'显示客户信息', 'url'=>array('lianxi', 'id'=>$model->id)),
	array('label'=>'客户管理', 'url'=>array('admin')),
);
?>

<h1>修改客户信息</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>