<div class="follows index">
	<h2><?php echo __('Follows'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('place_id'); ?></th>
			<th><?php echo $this->Paginator->sort('fllow_time'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($follows as $follow): ?>
	<tr>
		<td><?php echo h($follow['Follow']['id']); ?>&nbsp;</td>
		<td><?php echo h($follow['Follow']['user_id']); ?>&nbsp;</td>
		<td><?php echo h($follow['Follow']['place_id']); ?>&nbsp;</td>
		<td><?php echo h($follow['Follow']['fllow_time']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $follow['Follow']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $follow['Follow']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $follow['Follow']['id']), null, __('Are you sure you want to delete # %s?', $follow['Follow']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Follow'), array('action' => 'add')); ?></li>
	</ul>
</div>
