<div class="educations form">
<?php echo $this->Form->create('Education'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Education'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('education_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Education.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Education.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Educations'), array('action' => 'index')); ?></li>
	</ul>
</div>
