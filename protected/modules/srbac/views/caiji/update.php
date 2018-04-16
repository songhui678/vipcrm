<?php
/* @var $this CaijiController */
/* @var $model Caiji */

$this->breadcrumbs=array(
	'采集列表'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'采集列表列表', 'url'=>array('index')),
	array('label'=>'创建采集列表', 'url'=>array('create')),
	array('label'=>'显示采集列表', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'管理采集列表', 'url'=>array('admin')),
);
?>

<h1>修改采集列表 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>