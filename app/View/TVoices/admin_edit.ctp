<div class="tVoices form">
<?php echo $this->Form->create('TVoice'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit T Voice'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('v_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('TVoice.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('TVoice.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List T Voices'), array('action' => 'index')); ?></li>
	</ul>
</div>
