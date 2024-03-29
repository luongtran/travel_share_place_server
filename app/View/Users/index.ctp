<div class="users index">
	<h2><?php echo __('Users'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('l_name'); ?></th>
			<th><?php echo $this->Paginator->sort('f_name'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('password'); ?></th>
			<th><?php echo $this->Paginator->sort('preference'); ?></th>
			<th><?php echo $this->Paginator->sort('job'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('motto'); ?></th>
			<th><?php echo $this->Paginator->sort('relationship_id'); ?></th>
			<th><?php echo $this->Paginator->sort('sex_id'); ?></th>
			<th><?php echo $this->Paginator->sort('education_id'); ?></th>
			<th><?php echo $this->Paginator->sort('decentralization_id'); ?></th>
			<th><?php echo $this->Paginator->sort('workplace'); ?></th>
			<th><?php echo $this->Paginator->sort('birth'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['l_name']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['f_name']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['password']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['preference']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['job']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['address']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['motto']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['relationship_id']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['sex_id']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['education_id']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['decentralization_id']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['workplace']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['birth']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>
	</ul>
</div>
