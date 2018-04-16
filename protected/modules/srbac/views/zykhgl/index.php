<?php
/* @var $this ZykhglController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'转移客户表',
);

$this->menu=array(
	array('label'=>'创建转移客户表', 'url'=>array('create')),
	array('label'=>'管理转移客户表', 'url'=>array('admin')),
);
?>

<h1>转移客户表</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
