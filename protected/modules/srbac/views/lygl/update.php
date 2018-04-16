<?php
/* @var $this LyglController */
/* @var $model Sources */

$this->breadcrumbs=array(
	'客户来源表'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'添加客户来源', 'url'=>array('create')),
	array('label'=>'显示客户来源信息', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'客户来源管理', 'url'=>array('admin')),
);
?>

<h1>修改客户来源信息</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>