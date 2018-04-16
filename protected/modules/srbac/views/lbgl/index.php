<?php
/* @var $this LbglController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'分类',
);

$this->menu=array(
	array('label'=>'创建分类', 'url'=>array('create')),
	array('label'=>'管理分类', 'url'=>array('admin')),
);
?>

<h1>分类</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
