<div class="friends form">
<?php echo $this->Form->create('Friend'); ?>
	<fieldset>
		<legend><?php echo __('Edit Friend'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('friend_time');
		echo $this->Form->input('friend_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Friend.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Friend.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Friends'), array('action' => 'index')); ?></li>
	</ul>
</div>
