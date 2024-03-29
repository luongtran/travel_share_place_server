<div class="places index">
	<h2><?php echo __('Places'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('place_name'); ?></th>
			<th><?php echo $this->Paginator->sort('p_like'); ?></th>
			<th><?php echo $this->Paginator->sort('p_view'); ?></th>
			<th><?php echo $this->Paginator->sort('p_time'); ?></th>
			<th><?php echo $this->Paginator->sort('longitude'); ?></th>
			<th><?php echo $this->Paginator->sort('latitude'); ?></th>
			<th><?php echo $this->Paginator->sort('district_id'); ?></th>
			<th><?php echo $this->Paginator->sort('rate'); ?></th>
			<th><?php echo $this->Paginator->sort('website'); ?></th>
			<th><?php echo $this->Paginator->sort('mobile'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('tplace_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($places as $place): ?>
	<tr>
		<td><?php echo h($place['Place']['id']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['address']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['place_name']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['p_like']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['p_view']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['p_time']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['longitude']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['latitude']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['district_id']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['rate']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['website']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['mobile']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['description']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['tplace_id']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $place['Place']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $place['Place']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $place['Place']['id']), null, __('Are you sure you want to delete # %s?', $place['Place']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Place'), array('action' => 'add')); ?></li>
	</ul>
</div>
