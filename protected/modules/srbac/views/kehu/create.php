<?php
/* @var $this KehuController */
/* @var $model Client */

$this->breadcrumbs=array(
	'客户表'=>array('index'),
	'创建',
);

$this->menu=array(
	array('label'=>'客户管理', 'url'=>array('admin')),
);
?>

<h1>添加新客户</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>