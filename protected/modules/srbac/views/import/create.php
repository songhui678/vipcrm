<?php
/* @var $this ImportController */
/* @var $model ImportFile */

$this->breadcrumbs=array(
	'数据文件表'=>array('index'),
	'创建',
);

$this->menu=array(
	array('label'=>'上传文件管理', 'url'=>array('admin')),
);
?>

<h1>创建数据文件表</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>