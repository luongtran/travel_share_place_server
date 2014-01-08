<div class="decentralizations view">
<h2><?php echo __('Decentralization'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($decentralization['Decentralization']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Decentralization Name'); ?></dt>
		<dd>
			<?php echo h($decentralization['Decentralization']['decentralization_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Decentralization'), array('action' => 'edit', $decentralization['Decentralization']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Decentralization'), array('action' => 'delete', $decentralization['Decentralization']['id']), null, __('Are you sure you want to delete # %s?', $decentralization['Decentralization']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Decentralizations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Decentralization'), array('action' => 'add')); ?> </li>
	</ul>
</div>
