<?php
/* @var $this BmglController */
/* @var $model Department */

$this->breadcrumbs=array(
	'部门表'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'添加新部门', 'url'=>array('create')),
	array('label'=>'显示部门信息', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'部门管理', 'url'=>array('admin')),
);
?>

<h1>修改部门信息</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>