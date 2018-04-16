<?php
/* @var $this LianxijiluController */
/* @var $model ContactRecord */

$this->breadcrumbs=array(
	'联系记录'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'联系记录列表', 'url'=>array('index')),
	array('label'=>'创建联系记录', 'url'=>array('create')),
	array('label'=>'显示联系记录', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'管理联系记录', 'url'=>array('admin')),
);
?>

<h1>修改联系记录 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>