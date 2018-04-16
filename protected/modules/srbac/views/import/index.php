<?php
/* @var $this ImportController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'数据文件表',
);

$this->menu=array(
	array('label'=>'创建数据文件表', 'url'=>array('create')),
	array('label'=>'管理数据文件表', 'url'=>array('admin')),
);
?>

<h1>数据文件表</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
