<div class="statusComments form">
<?php echo $this->Form->create('StatusComment'); ?>
	<fieldset>
		<legend><?php echo __('Add Status Comment'); ?></legend>
	<?php
		echo $this->Form->input('messege');
		echo $this->Form->input('status_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('comment_time');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Status Comments'), array('action' => 'index')); ?></li>
	</ul>
</div>
