<div class="voices form">
<?php echo $this->Form->create('Voice'); ?>
	<fieldset>
		<legend><?php echo __('Add Voice'); ?></legend>
	<?php
		echo $this->Form->input('voice_id');
		echo $this->Form->input('content');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Voices'), array('action' => 'index')); ?></li>
	</ul>
</div>
