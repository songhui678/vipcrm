<?php
/* @var $this LytjController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'客户来源表',
);

$this->menu=array(
	array('label'=>'创建客户来源表', 'url'=>array('create')),
	array('label'=>'管理客户来源表', 'url'=>array('admin')),
);
?>

<h1>客户来源表</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
