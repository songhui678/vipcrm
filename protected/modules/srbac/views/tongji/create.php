<?php
/* @var $this TongjiController */
/* @var $model Client */

$this->breadcrumbs=array(
	'客户表'=>array('index'),
	'创建',
);

$this->menu=array(
);
?>

<h1>统计报表</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'bumenmany'=>$bumenmany,'usernamemany'=>$usernamemany,'starttimes'=>$starttimes,'stoptimes'=>$stoptimes,'total'=>$total,'recordList'=>$recordList,)); ?>