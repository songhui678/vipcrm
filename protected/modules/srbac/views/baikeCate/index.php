<?php
/* @var $this BaikeCateController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'茶百科分类',
);

$this->menu=array(
	array('label'=>'创建茶百科分类', 'url'=>array('create')),
	array('label'=>'管理茶百科分类', 'url'=>array('admin')),
);
?>

<h1>茶百科分类</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
