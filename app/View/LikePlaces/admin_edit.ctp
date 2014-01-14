<div class="likePlaces form">
<?php echo $this->Form->create('LikePlace'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Like Place'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('place_id');
		echo $this->Form->input('like_time');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('LikePlace.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('LikePlace.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Like Places'), array('action' => 'index')); ?></li>
	</ul>
</div>
