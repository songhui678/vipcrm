<?php
/* @var $this CaijiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'采集列表',
);

$this->menu=array(
	array('label'=>'创建采集列表', 'url'=>array('create')),
	array('label'=>'管理采集列表', 'url'=>array('admin')),
);
?>

<h1>采集列表</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
