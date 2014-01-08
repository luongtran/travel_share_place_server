<div class="statusComments form">
<?php echo $this->Form->create('StatusComment'); ?>
	<fieldset>
		<legend><?php echo __('Edit Status Comment'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('StatusComment.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('StatusComment.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Status Comments'), array('action' => 'index')); ?></li>
	</ul>
</div>
