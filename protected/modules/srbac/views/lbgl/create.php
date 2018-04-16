<?php
/* @var $this LbglController */
/* @var $model Cate */

$this->breadcrumbs=array(
	'分类'=>array('index'),
	'创建',
);

$this->menu=array(
	array('label'=>'分类列表', 'url'=>array('index')),
	array('label'=>'管理分类', 'url'=>array('admin')),
);
?>

<h1>创建分类</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>