<div class="circumstances form">
<?php echo $this->Form->create('Circumstance'); ?>
	<fieldset>
		<legend><?php echo __('Add Circumstance'); ?></legend>
	<?php
		echo $this->Form->input('content');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Circumstances'), array('action' => 'index')); ?></li>
	</ul>
</div>
