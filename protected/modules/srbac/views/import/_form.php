<?php
/* @var $this ImportController */
/* @var $model ImportFile */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'import-file-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">带*号的为必填项</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<div style="font-weight: bold;padding:10px 0 5px;">需要导入的文件 上传*【请等待上传成功提示】文件后缀为 .xls</div>
	    <?php echo $form->hiddenField($model,'file',array('id'=>'file','size'=>60,'maxlength'=>255,'readonly'=>'true')); ?> 
		<?php echo $form->error($model,'file'); ?>
		<?php
						list($s1, $s2) = explode(' ', microtime());		
						$fileName = (float)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000);	
						$fileName.=rand(0,9999);
						
						$filePath = 1; //导入数据文件路径编号
						
						$this->widget('application.extensions.swfupload.SWFUpload',array(
						  'callbackJS'=>'swfupload_callback1',
						  'fileTypes'=> '*.xls;',
						  'filePath'=> $filePath, //指定数组键名
						  'fileName'=>  $fileName, //指定上传后的文件名称
						  // 'after' => 'annex_pdf', //指定上传完成后的操作（如生成缩略图）
						  'button_image_url'=>'/static/images/sc7.png',
						  'button_width'=>82,
						  'button_height'=>23,
						  'debug' => false
						));
                    ?>
                    <script>
                        function swfupload_callback1(name,path,oldname,type,size,width,height){
                            alert("文件上传成功");
                            var str =oldname;
                            var arr=new Array();
                            arr=str.split('.');
                            $("#file").val('<?php echo date('Y-m-d') ?>/'+name);
                            $("#title").val(arr[0]);
                        }
                    </script>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('id'=>'title','size'=>30,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '文件提交' : '修改'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->