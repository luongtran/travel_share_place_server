<div class="voices form">
<?php echo $this->Form->create('Voice'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Voice'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('voice_id');
		echo $this->Form->input('content');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Voice.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Voice.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Voices'), array('action' => 'index')); ?></li>
	</ul>
</div>
