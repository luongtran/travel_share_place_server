<div class="circumstances view">
<h2><?php echo __('Circumstance'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($circumstance['Circumstance']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo h($circumstance['Circumstance']['content']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Circumstance'), array('action' => 'edit', $circumstance['Circumstance']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Circumstance'), array('action' => 'delete', $circumstance['Circumstance']['id']), null, __('Are you sure you want to delete # %s?', $circumstance['Circumstance']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Circumstances'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Circumstance'), array('action' => 'add')); ?> </li>
	</ul>
</div>
