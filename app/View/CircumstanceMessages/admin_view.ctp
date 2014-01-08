<div class="circumstanceMessages view">
<h2><?php echo __('Circumstance Message'); ?></h2>
	<dl>
		<dt><?php echo __('Circumstance Id'); ?></dt>
		<dd>
			<?php echo h($circumstanceMessage['CircumstanceMessage']['circumstance_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Message Id'); ?></dt>
		<dd>
			<?php echo h($circumstanceMessage['CircumstanceMessage']['message_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Circumstance Message'), array('action' => 'edit', $circumstanceMessage['CircumstanceMessage']['circumstance_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Circumstance Message'), array('action' => 'delete', $circumstanceMessage['CircumstanceMessage']['circumstance_id']), null, __('Are you sure you want to delete # %s?', $circumstanceMessage['CircumstanceMessage']['circumstance_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Circumstance Messages'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Circumstance Message'), array('action' => 'add')); ?> </li>
	</ul>
</div>
