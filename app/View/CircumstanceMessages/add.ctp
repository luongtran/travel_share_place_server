<div class="circumstanceMessages form">
<?php echo $this->Form->create('CircumstanceMessage'); ?>
	<fieldset>
		<legend><?php echo __('Add Circumstance Message'); ?></legend>
	<?php
		echo $this->Form->input('message_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Circumstance Messages'), array('action' => 'index')); ?></li>
	</ul>
</div>
