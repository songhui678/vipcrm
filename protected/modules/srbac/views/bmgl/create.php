<?php
/* @var $this BmglController */
/* @var $model Department */

$this->breadcrumbs=array(
	'部门表'=>array('index'),
	'创建',
);

$this->menu=array(
	array('label'=>'部门管理', 'url'=>array('admin')),
);
?>

<h1>添加新部门</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>