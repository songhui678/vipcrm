<?php
/* @var $this TongjiController */
/* @var $model Client */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bride'); ?>
		<?php echo $form->textField($model,'bride',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bride_phone'); ?>
		<?php echo $form->textField($model,'bride_phone',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type'); ?>
		<?php echo $form->textField($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contact'); ?>
		<?php echo $form->textField($model,'contact',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tel'); ?>
		<?php echo $form->textField($model,'tel',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'qq'); ?>
		<?php echo $form->textField($model,'qq',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'update_time'); ?>
		<?php echo $form->textField($model,'update_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usiness'); ?>
		<?php echo $form->textField($model,'usiness'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'situation'); ?>
		<?php echo $form->textField($model,'situation'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'province'); ?>
		<?php echo $form->textField($model,'province'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'zip'); ?>
		<?php echo $form->textField($model,'zip'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'eserve_time'); ?>
		<?php echo $form->textField($model,'eserve_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'remarks'); ?>
		<?php echo $form->textArea($model,'remarks',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'entry'); ?>
		<?php echo $form->textField($model,'entry'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'create_time'); ?>
		<?php echo $form->textField($model,'create_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'oid'); ?>
		<?php echo $form->textField($model,'oid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'source'); ?>
		<?php echo $form->textField($model,'source'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'site_id'); ?>
		<?php echo $form->textField($model,'site_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'remind_time'); ?>
		<?php echo $form->textField($model,'remind_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'remind_status'); ?>
		<?php echo $form->textField($model,'remind_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'marry_date'); ?>
		<?php echo $form->textField($model,'marry_date',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'budget'); ?>
		<?php echo $form->textField($model,'budget',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'order_status'); ?>
		<?php echo $form->textField($model,'order_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'prcie_total'); ?>
		<?php echo $form->textField($model,'prcie_total'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'deposit'); ?>
		<?php echo $form->textField($model,'deposit'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'deposit_time'); ?>
		<?php echo $form->textField($model,'deposit_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sign_user'); ?>
		<?php echo $form->textField($model,'sign_user',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'executor'); ?>
		<?php echo $form->textField($model,'executor',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'photo_date'); ?>
		<?php echo $form->textField($model,'photo_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'choose_date'); ?>
		<?php echo $form->textField($model,'choose_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'photographer'); ?>
		<?php echo $form->textField($model,'photographer',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'makeupartist'); ?>
		<?php echo $form->textField($model,'makeupartist',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'design_date'); ?>
		<?php echo $form->textField($model,'design_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'taketablets_date'); ?>
		<?php echo $form->textField($model,'taketablets_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'looksite_date'); ?>
		<?php echo $form->textField($model,'looksite_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'style_date'); ?>
		<?php echo $form->textField($model,'style_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'scheme_date'); ?>
		<?php echo $form->textField($model,'scheme_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'makeup_date'); ?>
		<?php echo $form->textField($model,'makeup_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'compere_date'); ?>
		<?php echo $form->textField($model,'compere_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rehearsal_date'); ?>
		<?php echo $form->textField($model,'rehearsal_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dep_id'); ?>
		<?php echo $form->textField($model,'dep_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->