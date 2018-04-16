<?php
/* @var $this TongjicxController */
/* @var $model Client */

$this->breadcrumbs=array(
	'客户表'=>array('index'),
	'创建',
);

$this->menu=array(
	array('label'=>'客户表列表', 'url'=>array('index')),
	array('label'=>'管理客户表', 'url'=>array('admin')),
);
?>

<h1>创建客户表</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>