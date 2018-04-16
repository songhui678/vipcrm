<?php
/* @var $this GerenziliaoController */
/* @var $model Admins */

$this->breadcrumbs=array(
	'后台用户'=>array('index'),
	$model->userid=>array('view','id'=>$model->userid),
	'Update',
);
?>

<h1>我的信息</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>