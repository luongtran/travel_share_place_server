<div class="circumstanceFeatures index">
	<h2><?php echo __('Circumstance Features'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('feature_id'); ?></th>
			<th><?php echo $this->Paginator->sort('circumstance_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($circumstanceFeatures as $circumstanceFeature): ?>
	<tr>
		<td><?php echo h($circumstanceFeature['CircumstanceFeature']['feature_id']); ?>&nbsp;</td>
		<td><?php echo h($circumstanceFeature['CircumstanceFeature']['circumstance_id']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $circumstanceFeature['CircumstanceFeature']['feature_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $circumstanceFeature['CircumstanceFeature']['feature_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $circumstanceFeature['CircumstanceFeature']['feature_id']), null, __('Are you sure you want to delete # %s?', $circumstanceFeature['CircumstanceFeature']['feature_id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Circumstance Feature'), array('action' => 'add')); ?></li>
	</ul>
</div>
