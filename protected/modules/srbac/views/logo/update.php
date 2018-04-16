<?php
/* @var $this LogoController */
/* @var $model Config */

$this->breadcrumbs=array(
	'网站设置'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'网站设置列表', 'url'=>array('index')),
	array('label'=>'创建网站设置', 'url'=>array('create')),
	array('label'=>'显示网站设置', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'管理网站设置', 'url'=>array('admin')),
);
?>

<h1>修改网站设置 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>