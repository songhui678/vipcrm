<?php
/* @var $this AdminsController */
/* @var $model Admins */

$this->breadcrumbs=array(
	'后台用户'=>array('index'),
	'创建',
);

$this->menu=array(
	array('label'=>'用户管理', 'url'=>array('admin')),
);
?>

<h1>添加新用户</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>