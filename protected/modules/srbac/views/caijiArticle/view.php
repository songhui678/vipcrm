<?php
/* @var $this CaijiArticleController */
/* @var $model CaijiArticle */

$this->breadcrumbs=array(
	'采集的文章'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'采集的文章列表', 'url'=>array('index')),
	array('label'=>'创建采集的文章', 'url'=>array('create')),
	array('label'=>'修改采集的文章', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'删除采集的文章', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理采集的文章', 'url'=>array('admin')),
);
?>

<h1>显示采集的文章 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'content',
		'keywords',
		'des',
		'create_time',
		'status',
		'mark',
		'caiji_id',
		'click',
		'cate_id',
		'laiyuan',
	),
)); ?>
