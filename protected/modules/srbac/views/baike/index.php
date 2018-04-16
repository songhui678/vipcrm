<?php
/* @var $this BaikeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'茶百科',
);

$this->menu=array(
	array('label'=>'创建茶百科', 'url'=>array('create')),
	array('label'=>'管理茶百科', 'url'=>array('admin')),
);
?>

<h1>茶百科</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
