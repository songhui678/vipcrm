<?php
/* @var $this LbglController */
/* @var $model Cate */

$this->breadcrumbs=array(
	'分类'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'分类列表', 'url'=>array('index')),
	array('label'=>'创建分类', 'url'=>array('create')),
	array('label'=>'显示分类', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'管理分类', 'url'=>array('admin')),
);
?>

<h1>修改分类 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>