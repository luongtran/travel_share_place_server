<div class="viewPlaces index">
	<h2><?php echo __('View Places'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('place_id'); ?></th>
			<th><?php echo $this->Paginator->sort('view_time'); ?></th>
			<th><?php echo $this->Paginator->sort('view_count'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($viewPlaces as $viewPlace): ?>
	<tr>
		<td><?php echo h($viewPlace['ViewPlace']['id']); ?>&nbsp;</td>
		<td><?php echo h($viewPlace['ViewPlace']['user_id']); ?>&nbsp;</td>
		<td><?php echo h($viewPlace['ViewPlace']['place_id']); ?>&nbsp;</td>
		<td><?php echo h($viewPlace['ViewPlace']['view_time']); ?>&nbsp;</td>
		<td><?php echo h($viewPlace['ViewPlace']['view_count']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $viewPlace['ViewPlace']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $viewPlace['ViewPlace']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $viewPlace['ViewPlace']['id']), null, __('Are you sure you want to delete # %s?', $viewPlace['ViewPlace']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New View Place'), array('action' => 'add')); ?></li>
	</ul>
</div>
