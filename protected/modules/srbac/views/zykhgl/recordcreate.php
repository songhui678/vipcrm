<?php
/* @var $this LianxijiluController */
/* @var $model ContactRecord */

$this->breadcrumbs=array(
	'联系记录'=>array('index'),
	'创建',
);

$this->menu=array(
	array('label'=>'转移客户管理', 'url'=>array('admin')),
);
?>

<h1><?php if(empty($kehumodel->name)){
	if(!empty($kehumodel->bride)){
		echo $kehumodel->bride;
	}
}else{
     echo $kehumodel->name;
     if(!empty($kehumodel->bride)){
		echo '或'.$kehumodel->bride;
	}
	
} ?>的信息</h1>

<?php echo $this->renderPartial('_recordform', array('model'=>$model,'contactRecordmany'=>$contactRecordmany,'kehumodel'=>$kehumodel,)); ?>