<?php
/* @var $this TongjiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'客户表',
);

$this->menu=array(
	array('label'=>'创建客户表', 'url'=>array('create')),
	array('label'=>'管理客户表', 'url'=>array('admin')),
);
?>

<h1>客户表</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
