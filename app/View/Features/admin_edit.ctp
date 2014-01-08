<div class="features form">
<?php echo $this->Form->create('Feature'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Feature'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('f_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Feature.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Feature.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Features'), array('action' => 'index')); ?></li>
	</ul>
</div>
