<div class="friends view">
<h2><?php echo __('Friend'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($friend['Friend']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
			<?php echo h($friend['Friend']['user_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Friend Time'); ?></dt>
		<dd>
			<?php echo h($friend['Friend']['friend_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Friend Id'); ?></dt>
		<dd>
			<?php echo h($friend['Friend']['friend_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Friend'), array('action' => 'edit', $friend['Friend']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Friend'), array('action' => 'delete', $friend['Friend']['id']), null, __('Are you sure you want to delete # %s?', $friend['Friend']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Friends'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Friend'), array('action' => 'add')); ?> </li>
	</ul>
</div>
