<?php
/* @var $this LytjController */
/* @var $model Sources */

$this->breadcrumbs=array(
	'客户来源表'=>array('index'),
	'创建',
);

$this->menu=array(
	array('label'=>'客户来源表列表', 'url'=>array('index')),
	array('label'=>'管理客户来源表', 'url'=>array('admin')),
);
?>

<h1>创建客户来源表</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>