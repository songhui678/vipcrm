<?php
/* @var $this LxjlController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'联系状态',
);

$this->menu=array(
	array('label'=>'创建联系状态', 'url'=>array('create')),
	array('label'=>'管理联系状态', 'url'=>array('admin')),
);
?>

<h1>联系状态</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
