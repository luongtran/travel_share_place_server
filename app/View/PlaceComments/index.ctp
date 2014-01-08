<div class="placeComments index">
	<h2><?php echo __('Place Comments'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('messege'); ?></th>
			<th><?php echo $this->Paginator->sort('place_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('comment_time'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($placeComments as $placeComment): ?>
	<tr>
		<td><?php echo h($placeComment['PlaceComment']['id']); ?>&nbsp;</td>
		<td><?php echo h($placeComment['PlaceComment']['messege']); ?>&nbsp;</td>
		<td><?php echo h($placeComment['PlaceComment']['place_id']); ?>&nbsp;</td>
		<td><?php echo h($placeComment['PlaceComment']['user_id']); ?>&nbsp;</td>
		<td><?php echo h($placeComment['PlaceComment']['comment_time']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $placeComment['PlaceComment']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $placeComment['PlaceComment']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $placeComment['PlaceComment']['id']), null, __('Are you sure you want to delete # %s?', $placeComment['PlaceComment']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Place Comment'), array('action' => 'add')); ?></li>
	</ul>
</div>
