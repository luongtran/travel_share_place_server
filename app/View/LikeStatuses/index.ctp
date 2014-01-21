<div class="likeStatuses index">
	<h2><?php echo __('Like Statuses'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('status_id'); ?></th>
			<th><?php echo $this->Paginator->sort('like_time'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($likeStatuses as $likeStatus): ?>
	<tr>
		<td><?php echo h($likeStatus['LikeStatus']['id']); ?>&nbsp;</td>
		<td><?php echo h($likeStatus['LikeStatus']['user_id']); ?>&nbsp;</td>
		<td><?php echo h($likeStatus['LikeStatus']['status_id']); ?>&nbsp;</td>
		<td><?php echo h($likeStatus['LikeStatus']['like_time']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $likeStatus['LikeStatus']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $likeStatus['LikeStatus']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $likeStatus['LikeStatus']['id']), null, __('Are you sure you want to delete # %s?', $likeStatus['LikeStatus']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Like Status'), array('action' => 'add')); ?></li>
	</ul>
</div>
