<div class="decentralizations form">
<?php echo $this->Form->create('Decentralization'); ?>
	<fieldset>
		<legend><?php echo __('Add Decentralization'); ?></legend>
	<?php
		echo $this->Form->input('decentralization_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Decentralizations'), array('action' => 'index')); ?></li>
	</ul>
</div>
