<?php
/* @var $this CaijiArticleController */
/* @var $model CaijiArticle */

$this->breadcrumbs=array(
	'采集的文章'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'采集的文章列表', 'url'=>array('index')),
	array('label'=>'创建采集的文章', 'url'=>array('create')),
	array('label'=>'显示采集的文章', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'管理采集的文章', 'url'=>array('admin')),
);
?>

<h1>修改采集的文章 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>