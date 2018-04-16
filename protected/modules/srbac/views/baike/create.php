<?php
/* @var $this BaikeController */
/* @var $model Baike */

$this->breadcrumbs=array(
	'茶百科'=>array('index'),
	'创建',
);

$this->menu=array(
	array('label'=>'茶百科列表', 'url'=>array('index')),
	array('label'=>'管理茶百科', 'url'=>array('admin')),
);
?>

<h1>创建茶百科</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>