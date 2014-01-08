<div class="tVoices form">
<?php echo $this->Form->create('TVoice'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add T Voice'); ?></legend>
	<?php
		echo $this->Form->input('v_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List T Voices'), array('action' => 'index')); ?></li>
	</ul>
</div>
