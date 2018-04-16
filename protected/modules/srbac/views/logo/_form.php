<?php
/* @var $this LogoController */
/* @var $model Config */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'config-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">带*号的为必填项</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<div style="font-weight: bold;padding:10px 0 5px;">建议上传的logo尺寸为 120px*45px </div>
	    <?php echo $form->hiddenField($model,'site_logo',array('id'=>'site_logo','size'=>60,'maxlength'=>255,'readonly'=>'true')); ?> 
		<?php echo $form->error($model,'site_logo'); ?>
		<?php
						list($s1, $s2) = explode(' ', microtime());		
						$fileName = (float)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000);	
						$fileName.=rand(0,9999);
						
						$filePath = 1; //导入数据文件路径编号

						$this->widget('application.extensions.swfupload.SWFUpload',array(
						  'callbackJS'=>'swfupload_callback1',
						   'fileTypes'=> '*.jpg;*.gif;*.jpeg;*.png;',
						  'filePath'=> $filePath, //指定数组键名
						  // 'fileName'=>  $fileName, //指定上传后的文件名称
						  'after' => 'tuangoutu', //指定上传完成后的操作（如生成缩略图）
						  'button_image_url'=>'/static/images/sc8.jpg',
						  'button_width'=>102,
						  'button_height'=>38,
						  'debug' => false
						));
                    ?>
                    <script>
                        function swfupload_callback1(name,path,oldname,type,size,width,height){
                            alert("文件上传成功");
                            $("#site_logo").val('<?php echo date('Y-m-d') ?>/'+name);
                        }
                    </script>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '提交' : '修改'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->