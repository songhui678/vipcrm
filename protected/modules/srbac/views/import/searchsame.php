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

<h1>查看导入数据相同</h1>
<!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
  'id'=>'import-file-grid',
  'dataProvider'=>$model->search(),
  'columns'=>array(
		array(
    'header' => '序号', //$this->grid->dataProvider->getTotalItemCount() 总条数  
        'value' => '$this->grid->dataProvider->getPagination()->getOffset()+($row+1)', //CDataColumn $this->grid  
        'htmlOptions' => array(  
            'width' => '30px',  
        ),  
    ),
    array(
      'header'=>'新郎名字',
      'name'=>'ClientOne.name',
      // 'type'=>'raw',
      // 'value'=>'CHtml::link($data->ClientOne->name?$data->ClientOne->name:"暂无","/srbac/kehu/lianxi/id/".$data->client_id,array("target"=>"_blank"))',
    ),
    array(
      'header'=>'新娘名字',
      'name'=>'ClientOne.bride',
    ),
    array(
      'header'=>'联系人',
      'name'=>'ClientOne.contact',
    ),
    'ImportOne.title',
	),
)); ?>