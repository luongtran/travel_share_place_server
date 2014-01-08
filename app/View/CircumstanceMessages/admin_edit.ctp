<div class="circumstanceMessages form">
<?php echo $this->Form->create('CircumstanceMessage'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Circumstance Message'); ?></legend>
	<?php
		echo $this->Form->input('circumstance_id');
		echo $this->Form->input('message_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CircumstanceMessage.circumstance_id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('CircumstanceMessage.circumstance_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Circumstance Messages'), array('action' => 'index')); ?></li>
	</ul>
</div>
