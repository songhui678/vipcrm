<?php
/* @var $this ZykhglController */
/* @var $model ChangeClient */

$this->breadcrumbs=array(
	'转移客户表'=>array('index'),
	'创建',
);

$this->menu=array(
	array('label'=>'转移客户表列表', 'url'=>array('index')),
	array('label'=>'管理转移客户表', 'url'=>array('admin')),
);
?>

<h1>创建转移客户表</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>