<div class="eventActivities view">
<h2><?php echo __('Event Activity'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($eventActivity['EventActivity']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event Name'); ?></dt>
		<dd>
			<?php echo h($eventActivity['EventActivity']['event_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Event Activity'), array('action' => 'edit', $eventActivity['EventActivity']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Event Activity'), array('action' => 'delete', $eventActivity['EventActivity']['id']), null, __('Are you sure you want to delete # %s?', $eventActivity['EventActivity']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Event Activities'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event Activity'), array('action' => 'add')); ?> </li>
	</ul>
</div>
