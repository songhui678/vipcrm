<?php
/* @var $this BaikeCateController */
/* @var $model BaikeCate */

$this->breadcrumbs=array(
	'茶百科分类'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'茶百科分类列表', 'url'=>array('index')),
	array('label'=>'创建茶百科分类', 'url'=>array('create')),
	array('label'=>'显示茶百科分类', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'管理茶百科分类', 'url'=>array('admin')),
);
?>

<h1>修改茶百科分类 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>