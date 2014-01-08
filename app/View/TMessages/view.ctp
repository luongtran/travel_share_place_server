<div class="tMessages view">
<h2><?php echo __('T Message'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tMessage['TMessage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('M Name'); ?></dt>
		<dd>
			<?php echo h($tMessage['TMessage']['m_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit T Message'), array('action' => 'edit', $tMessage['TMessage']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete T Message'), array('action' => 'delete', $tMessage['TMessage']['id']), null, __('Are you sure you want to delete # %s?', $tMessage['TMessage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List T Messages'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New T Message'), array('action' => 'add')); ?> </li>
	</ul>
</div>
