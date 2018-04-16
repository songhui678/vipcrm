<?php
/* @var $this BmglController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'部门表',
);

$this->menu=array(
	array('label'=>'创建部门表', 'url'=>array('create')),
	array('label'=>'管理部门表', 'url'=>array('admin')),
);
?>

<h1>部门表</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
