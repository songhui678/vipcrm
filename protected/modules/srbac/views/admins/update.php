<?php
/* @var $this AdminsController */
/* @var $model Admins */

$this->breadcrumbs=array(
	'后台用户'=>array('index'),
	$model->userid=>array('view','id'=>$model->userid),
	'Update',
);

$this->menu=array(
	array('label'=>'添加新用户', 'url'=>array('create')),
	array('label'=>'显示用户信息', 'url'=>array('view', 'id'=>$model->userid)),
	array('label'=>'用户管理', 'url'=>array('admin')),
);
?>

<h1>修改用户信息</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>