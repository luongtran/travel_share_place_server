<div class="likeStatuses form">
<?php echo $this->Form->create('LikeStatus'); ?>
	<fieldset>
		<legend><?php echo __('Edit Like Status'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('status_id');
		echo $this->Form->input('like_time');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('LikeStatus.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('LikeStatus.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Like Statuses'), array('action' => 'index')); ?></li>
	</ul>
</div>
