<div class="statusComments view">
<h2><?php echo __('Status Comment'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($statusComment['StatusComment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Messege'); ?></dt>
		<dd>
			<?php echo h($statusComment['StatusComment']['messege']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status Id'); ?></dt>
		<dd>
			<?php echo h($statusComment['StatusComment']['status_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
			<?php echo h($statusComment['StatusComment']['user_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment Time'); ?></dt>
		<dd>
			<?php echo h($statusComment['StatusComment']['comment_time']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Status Comment'), array('action' => 'edit', $statusComment['StatusComment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Status Comment'), array('action' => 'delete', $statusComment['StatusComment']['id']), null, __('Are you sure you want to delete # %s?', $statusComment['StatusComment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Status Comments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status Comment'), array('action' => 'add')); ?> </li>
	</ul>
</div>
