<?php
/* @var $this CaijiController */
/* @var $model Caiji */

$this->breadcrumbs=array(
	'采集列表'=>array('index'),
	'创建',
);

$this->menu=array(
	array('label'=>'采集列表列表', 'url'=>array('index')),
	array('label'=>'管理采集列表', 'url'=>array('admin')),
);
?>

<h1>创建采集列表</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>