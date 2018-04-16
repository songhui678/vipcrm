<?php
/* @var $this CaijiGuizeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'采集规则',
);

$this->menu=array(
	array('label'=>'创建采集规则', 'url'=>array('create')),
	array('label'=>'管理采集规则', 'url'=>array('admin')),
);
?>

<h1>采集规则</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
