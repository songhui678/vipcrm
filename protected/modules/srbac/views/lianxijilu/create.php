<?php
/* @var $this LianxijiluController */
/* @var $model ContactRecord */

$this->breadcrumbs=array(
	'联系记录'=>array('index'),
	'创建',
);

$this->menu=array(
	array('label'=>'联系记录列表', 'url'=>array('index')),
	array('label'=>'管理联系记录', 'url'=>array('admin')),
);
?>

<h1>创建联系记录</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>