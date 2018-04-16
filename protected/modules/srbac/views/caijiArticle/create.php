<?php
/* @var $this CaijiArticleController */
/* @var $model CaijiArticle */

$this->breadcrumbs=array(
	'采集的文章'=>array('index'),
	'创建',
);

$this->menu=array(
	array('label'=>'采集的文章列表', 'url'=>array('index')),
	array('label'=>'管理采集的文章', 'url'=>array('admin')),
);
?>

<h1>创建采集的文章</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>