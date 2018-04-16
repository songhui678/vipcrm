<?php
/* @var $this TongjicxController */
/* @var $model Client */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'client-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">带*号的为必填项</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bride'); ?>
		<?php echo $form->textField($model,'bride',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'bride'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bride_phone'); ?>
		<?php echo $form->textField($model,'bride_phone',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'bride_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type'); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact'); ?>
		<?php echo $form->textField($model,'contact',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'contact'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tel'); ?>
		<?php echo $form->textField($model,'tel',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'tel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'qq'); ?>
		<?php echo $form->textField($model,'qq',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'qq'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'update_time'); ?>
		<?php echo $form->textField($model,'update_time'); ?>
		<?php echo $form->error($model,'update_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usiness'); ?>
		<?php echo $form->textField($model,'usiness'); ?>
		<?php echo $form->error($model,'usiness'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'situation'); ?>
		<?php echo $form->textField($model,'situation'); ?>
		<?php echo $form->error($model,'situation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'province'); ?>
		<?php echo $form->textField($model,'province'); ?>
		<?php echo $form->error($model,'province'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'zip'); ?>
		<?php echo $form->textField($model,'zip'); ?>
		<?php echo $form->error($model,'zip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'eserve_time'); ?>
		<?php echo $form->textField($model,'eserve_time'); ?>
		<?php echo $form->error($model,'eserve_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'remarks'); ?>
		<?php echo $form->textArea($model,'remarks',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'remarks'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'entry'); ?>
		<?php echo $form->textField($model,'entry'); ?>
		<?php echo $form->error($model,'entry'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_time'); ?>
		<?php echo $form->textField($model,'create_time'); ?>
		<?php echo $form->error($model,'create_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'oid'); ?>
		<?php echo $form->textField($model,'oid'); ?>
		<?php echo $form->error($model,'oid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'source'); ?>
		<?php echo $form->textField($model,'source'); ?>
		<?php echo $form->error($model,'source'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'site_id'); ?>
		<?php echo $form->textField($model,'site_id'); ?>
		<?php echo $form->error($model,'site_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'remind_time'); ?>
		<?php echo $form->textField($model,'remind_time'); ?>
		<?php echo $form->error($model,'remind_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'remind_status'); ?>
		<?php echo $form->textField($model,'remind_status'); ?>
		<?php echo $form->error($model,'remind_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'marry_date'); ?>
		<?php echo $form->textField($model,'marry_date',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'marry_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'budget'); ?>
		<?php echo $form->textField($model,'budget',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'budget'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'order_status'); ?>
		<?php echo $form->textField($model,'order_status'); ?>
		<?php echo $form->error($model,'order_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prcie_total'); ?>
		<?php echo $form->textField($model,'prcie_total'); ?>
		<?php echo $form->error($model,'prcie_total'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'deposit'); ?>
		<?php echo $form->textField($model,'deposit'); ?>
		<?php echo $form->error($model,'deposit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'deposit_time'); ?>
		<?php echo $form->textField($model,'deposit_time'); ?>
		<?php echo $form->error($model,'deposit_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sign_user'); ?>
		<?php echo $form->textField($model,'sign_user',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'sign_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'executor'); ?>
		<?php echo $form->textField($model,'executor',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'executor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'photo_date'); ?>
		<?php echo $form->textField($model,'photo_date'); ?>
		<?php echo $form->error($model,'photo_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'choose_date'); ?>
		<?php echo $form->textField($model,'choose_date'); ?>
		<?php echo $form->error($model,'choose_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'photographer'); ?>
		<?php echo $form->textField($model,'photographer',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'photographer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'makeupartist'); ?>
		<?php echo $form->textField($model,'makeupartist',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'makeupartist'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'design_date'); ?>
		<?php echo $form->textField($model,'design_date'); ?>
		<?php echo $form->error($model,'design_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'taketablets_date'); ?>
		<?php echo $form->textField($model,'taketablets_date'); ?>
		<?php echo $form->error($model,'taketablets_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'looksite_date'); ?>
		<?php echo $form->textField($model,'looksite_date'); ?>
		<?php echo $form->error($model,'looksite_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'style_date'); ?>
		<?php echo $form->textField($model,'style_date'); ?>
		<?php echo $form->error($model,'style_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'scheme_date'); ?>
		<?php echo $form->textField($model,'scheme_date'); ?>
		<?php echo $form->error($model,'scheme_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'makeup_date'); ?>
		<?php echo $form->textField($model,'makeup_date'); ?>
		<?php echo $form->error($model,'makeup_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'compere_date'); ?>
		<?php echo $form->textField($model,'compere_date'); ?>
		<?php echo $form->error($model,'compere_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rehearsal_date'); ?>
		<?php echo $form->textField($model,'rehearsal_date'); ?>
		<?php echo $form->error($model,'rehearsal_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dep_id'); ?>
		<?php echo $form->textField($model,'dep_id'); ?>
		<?php echo $form->error($model,'dep_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '创建' : '修改'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->