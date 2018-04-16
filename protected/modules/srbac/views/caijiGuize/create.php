<?php
/* @var $this CaijiGuizeController */
/* @var $model CaijiGuize */

$this->breadcrumbs=array(
	'采集规则'=>array('index'),
	'创建',
);

$this->menu=array(
	array('label'=>'采集规则列表', 'url'=>array('index')),
	array('label'=>'管理采集规则', 'url'=>array('admin')),
);
?>

<h1>创建采集规则</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>