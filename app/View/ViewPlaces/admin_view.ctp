<div class="viewPlaces view">
<h2><?php echo __('View Place'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($viewPlace['ViewPlace']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
			<?php echo h($viewPlace['ViewPlace']['user_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Place Id'); ?></dt>
		<dd>
			<?php echo h($viewPlace['ViewPlace']['place_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('View Time'); ?></dt>
		<dd>
			<?php echo h($viewPlace['ViewPlace']['view_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('View Count'); ?></dt>
		<dd>
			<?php echo h($viewPlace['ViewPlace']['view_count']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit View Place'), array('action' => 'edit', $viewPlace['ViewPlace']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete View Place'), array('action' => 'delete', $viewPlace['ViewPlace']['id']), null, __('Are you sure you want to delete # %s?', $viewPlace['ViewPlace']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List View Places'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New View Place'), array('action' => 'add')); ?> </li>
	</ul>
</div>
