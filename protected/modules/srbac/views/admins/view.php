<?php
/* @var $this AdminsController */
/* @var $model Admins */

$this->breadcrumbs=array(
	'后台用户'=>array('index'),
	$model->userid,
);
?>

<h1>显示用户资料</h1>

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
			'header'=>'是否有效',
			'name'=>'validate',
			'value'=>$model->ColorStatusName,
		),
		array(
			'header'=>'职位',
			'name'=>'post',
			'value'=>$model->PostName,
		),
		array(
			'header'=>'部门',
			'name'=>'dep_id',
			'value'=>$model->DepOne?$model->DepOne->name:'无',
		),
		'createtime',
		'phone',
		'email',
	),
)); ?>