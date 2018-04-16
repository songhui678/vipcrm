<?php
/* @var $this LxjlController */
/* @var $model Record */

$this->breadcrumbs=array(
	'联系状态'=>array('index'),
	'创建',
);

$this->menu=array(
	array('label'=>'联系状态管理', 'url'=>array('admin')),
);
?>

<h1>添加联系状态</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>