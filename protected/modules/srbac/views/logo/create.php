<?php
/* @var $this LogoController */
/* @var $model Config */

$this->breadcrumbs=array(
	'网站设置'=>array('index'),
	'创建',
);

$this->menu=array(
);
?>

<h1>创建网站设置</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>