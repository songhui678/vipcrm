<?php
/* @var $this LyglController */
/* @var $model Sources */

$this->breadcrumbs=array(
	'客户来源表'=>array('index'),
	'创建',
);

$this->menu=array(
	array('label'=>'客户来源管理', 'url'=>array('admin')),
);
?>

<h1>添加客户来源</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>