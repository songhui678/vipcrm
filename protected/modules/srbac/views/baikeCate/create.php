<?php
/* @var $this BaikeCateController */
/* @var $model BaikeCate */

$this->breadcrumbs=array(
	'茶百科分类'=>array('index'),
	'创建',
);

$this->menu=array(
	array('label'=>'茶百科分类列表', 'url'=>array('index')),
	array('label'=>'管理茶百科分类', 'url'=>array('admin')),
);
?>

<h1>创建茶百科分类</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>