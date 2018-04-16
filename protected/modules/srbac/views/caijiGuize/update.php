<?php
/* @var $this CaijiGuizeController */
/* @var $model CaijiGuize */

$this->breadcrumbs=array(
	'采集规则'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'采集规则列表', 'url'=>array('index')),
	array('label'=>'创建采集规则', 'url'=>array('create')),
	array('label'=>'显示采集规则', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'管理采集规则', 'url'=>array('admin')),
);
?>

<h1>修改采集规则 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>