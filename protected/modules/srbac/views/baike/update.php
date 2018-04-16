<?php
/* @var $this BaikeController */
/* @var $model Baike */

$this->breadcrumbs=array(
	'茶百科'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'茶百科列表', 'url'=>array('index')),
	array('label'=>'创建茶百科', 'url'=>array('create')),
	array('label'=>'显示茶百科', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'管理茶百科', 'url'=>array('admin')),
);
?>

<h1>修改茶百科 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>