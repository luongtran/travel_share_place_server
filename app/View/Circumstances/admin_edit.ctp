<div class="circumstances form">
<?php echo $this->Form->create('Circumstance'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Circumstance'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('content');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Circumstance.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Circumstance.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Circumstances'), array('action' => 'index')); ?></li>
	</ul>
</div>
