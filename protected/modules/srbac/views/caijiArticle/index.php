<?php
/* @var $this CaijiArticleController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'采集的文章',
);

$this->menu=array(
	array('label'=>'创建采集的文章', 'url'=>array('create')),
	array('label'=>'管理采集的文章', 'url'=>array('admin')),
);
?>

<h1>采集的文章</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
