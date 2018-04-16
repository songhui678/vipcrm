<?php
/* @var $this LxjlController */
/* @var $model Record */

$this->breadcrumbs=array(
	'联系状态'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'添加联系状态', 'url'=>array('create')),
	array('label'=>'显示联系状态信息', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'联系状态管理', 'url'=>array('admin')),
);
?>

<h1>修改联系状态信息</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>