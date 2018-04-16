<?php
/* @var $this TongjiController */
/* @var $model Client */

$this->breadcrumbs=array(
	'客户表'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'客户表列表', 'url'=>array('index')),
	array('label'=>'创建客户表', 'url'=>array('create')),
	array('label'=>'修改客户表', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'删除客户表', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理客户表', 'url'=>array('admin')),
);
?>

<h1>显示客户表 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'bride',
		'bride_phone',
		'type',
		'contact',
		'address',
		'tel',
		'phone',
		'email',
		'qq',
		'status',
		'update_time',
		'usiness',
		'situation',
		'province',
		'zip',
		'eserve_time',
		'remarks',
		'entry',
		'create_time',
		'oid',
		'source',
		'site_id',
		'remind_time',
		'remind_status',
		'marry_date',
		'budget',
		'order_status',
		'prcie_total',
		'deposit',
		'deposit_time',
		'sign_user',
		'executor',
		'photo_date',
		'choose_date',
		'photographer',
		'makeupartist',
		'design_date',
		'taketablets_date',
		'looksite_date',
		'style_date',
		'scheme_date',
		'makeup_date',
		'compere_date',
		'rehearsal_date',
		'dep_id',
	),
)); ?>
