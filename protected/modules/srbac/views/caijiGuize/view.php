<?php
/* @var $this CaijiGuizeController */
/* @var $model CaijiGuize */

$this->breadcrumbs=array(
	'采集规则'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'采集规则列表', 'url'=>array('index')),
	array('label'=>'创建采集规则', 'url'=>array('create')),
	array('label'=>'修改采集规则', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'删除采集规则', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理采集规则', 'url'=>array('admin')),
);
?>

<h1>显示采集规则 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'guize_name',
		'a_guize',
		'title_guize',
		'content_guize',
		'auto_keywords',
		'keywords_guize',
		'des_guize',
	),
)); ?>
