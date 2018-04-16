<?php
/* @var $this ImportController */
/* @var $model ImportFile */

$this->breadcrumbs=array(
	'Import Files'=>array('index'),
	'管理',
);

$this->menu=array(
	array('label'=>'返回', 'url'=>array('admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
	$('#import-file-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>不符合导入数据的条件</h1>
<!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'import-file-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'id',
    'name',
    'phone',
    'bride',
    'bride_phone',
    'remark',
    'createtime',
    'ImportOne.title',
	),
)); ?>