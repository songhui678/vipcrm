<?php
/* @var $this GerenziliaoController */
/* @var $model Admins */

$this->breadcrumbs=array(
	'后台用户'=>array('index'),
	$model->userid,
);

$this->menu=array(
	array('label'=>'修改个人资料', 'url'=>array('update', 'id'=>$model->userid)),
);
?>

<h1>个人资料 <!-- #<?php echo $model->userid; ?> --></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'username',
		'realname',
		'ip',
		array(
			'header'=>'性别',
			'name'=>'sex',
			'value'=>$model->SexName,
		),
		array(
			'header'=>'部门',
			'name'=>'dep_id',
			'value'=>$model->DepOne?$model->DepOne->name:'无',
			'visible'=>Yii::app()->controller->module->getComponent('user')->post==2 || Yii::app()->controller->module->getComponent('user')->post==3,
		),
		'createtime',
		'phone',
		'email',
	),
)); ?>
