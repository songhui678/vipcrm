<?php
/* @var $this TongjiController */
/* @var $data Client */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bride')); ?>:</b>
	<?php echo CHtml::encode($data->bride); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bride_phone')); ?>:</b>
	<?php echo CHtml::encode($data->bride_phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact')); ?>:</b>
	<?php echo CHtml::encode($data->contact); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('tel')); ?>:</b>
	<?php echo CHtml::encode($data->tel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('qq')); ?>:</b>
	<?php echo CHtml::encode($data->qq); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_time')); ?>:</b>
	<?php echo CHtml::encode($data->update_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usiness')); ?>:</b>
	<?php echo CHtml::encode($data->usiness); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('situation')); ?>:</b>
	<?php echo CHtml::encode($data->situation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('province')); ?>:</b>
	<?php echo CHtml::encode($data->province); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zip')); ?>:</b>
	<?php echo CHtml::encode($data->zip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eserve_time')); ?>:</b>
	<?php echo CHtml::encode($data->eserve_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('remarks')); ?>:</b>
	<?php echo CHtml::encode($data->remarks); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('entry')); ?>:</b>
	<?php echo CHtml::encode($data->entry); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
	<?php echo CHtml::encode($data->create_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('oid')); ?>:</b>
	<?php echo CHtml::encode($data->oid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('source')); ?>:</b>
	<?php echo CHtml::encode($data->source); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('site_id')); ?>:</b>
	<?php echo CHtml::encode($data->site_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('remind_time')); ?>:</b>
	<?php echo CHtml::encode($data->remind_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('remind_status')); ?>:</b>
	<?php echo CHtml::encode($data->remind_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('marry_date')); ?>:</b>
	<?php echo CHtml::encode($data->marry_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('budget')); ?>:</b>
	<?php echo CHtml::encode($data->budget); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_status')); ?>:</b>
	<?php echo CHtml::encode($data->order_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prcie_total')); ?>:</b>
	<?php echo CHtml::encode($data->prcie_total); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deposit')); ?>:</b>
	<?php echo CHtml::encode($data->deposit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deposit_time')); ?>:</b>
	<?php echo CHtml::encode($data->deposit_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sign_user')); ?>:</b>
	<?php echo CHtml::encode($data->sign_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('executor')); ?>:</b>
	<?php echo CHtml::encode($data->executor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('photo_date')); ?>:</b>
	<?php echo CHtml::encode($data->photo_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('choose_date')); ?>:</b>
	<?php echo CHtml::encode($data->choose_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('photographer')); ?>:</b>
	<?php echo CHtml::encode($data->photographer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('makeupartist')); ?>:</b>
	<?php echo CHtml::encode($data->makeupartist); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('design_date')); ?>:</b>
	<?php echo CHtml::encode($data->design_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('taketablets_date')); ?>:</b>
	<?php echo CHtml::encode($data->taketablets_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('looksite_date')); ?>:</b>
	<?php echo CHtml::encode($data->looksite_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('style_date')); ?>:</b>
	<?php echo CHtml::encode($data->style_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('scheme_date')); ?>:</b>
	<?php echo CHtml::encode($data->scheme_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('makeup_date')); ?>:</b>
	<?php echo CHtml::encode($data->makeup_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('compere_date')); ?>:</b>
	<?php echo CHtml::encode($data->compere_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rehearsal_date')); ?>:</b>
	<?php echo CHtml::encode($data->rehearsal_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dep_id')); ?>:</b>
	<?php echo CHtml::encode($data->dep_id); ?>
	<br />

	*/ ?>

</div>