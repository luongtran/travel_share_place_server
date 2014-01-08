<div class="tMessages form">
<?php echo $this->Form->create('TMessage'); ?>
	<fieldset>
		<legend><?php echo __('Edit T Message'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('m_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('TMessage.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('TMessage.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List T Messages'), array('action' => 'index')); ?></li>
	</ul>
</div>
