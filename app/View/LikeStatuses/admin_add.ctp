<div class="likeStatuses form">
<?php echo $this->Form->create('LikeStatus'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Like Status'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Like Statuses'), array('action' => 'index')); ?></li>
	</ul>
</div>
