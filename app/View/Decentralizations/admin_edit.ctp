<div class="decentralizations form">
<?php echo $this->Form->create('Decentralization'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Decentralization'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('decentralization_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Decentralization.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Decentralization.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Decentralizations'), array('action' => 'index')); ?></li>
	</ul>
</div>
