<div class="placeComments form">
<?php echo $this->Form->create('PlaceComment'); ?>
	<fieldset>
		<legend><?php echo __('Edit Place Comment'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('messege');
		echo $this->Form->input('place_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('comment_time');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('PlaceComment.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('PlaceComment.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Place Comments'), array('action' => 'index')); ?></li>
	</ul>
</div>
