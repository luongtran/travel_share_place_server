<div class="voices view">
<h2><?php echo __('Voice'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($voice['Voice']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Voice Id'); ?></dt>
		<dd>
			<?php echo h($voice['Voice']['voice_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo h($voice['Voice']['content']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Voice'), array('action' => 'edit', $voice['Voice']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Voice'), array('action' => 'delete', $voice['Voice']['id']), null, __('Are you sure you want to delete # %s?', $voice['Voice']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Voices'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Voice'), array('action' => 'add')); ?> </li>
	</ul>
</div>
