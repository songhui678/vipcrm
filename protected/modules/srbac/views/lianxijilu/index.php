<?php
/* @var $this LianxijiluController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'联系记录',
);

$this->menu=array(
	array('label'=>'创建联系记录', 'url'=>array('create')),
	array('label'=>'管理联系记录', 'url'=>array('admin')),
);
?>

<h1>联系记录</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
