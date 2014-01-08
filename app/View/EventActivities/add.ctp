<div class="eventActivities form">
<?php echo $this->Form->create('EventActivity'); ?>
	<fieldset>
		<legend><?php echo __('Add Event Activity'); ?></legend>
	<?php
		echo $this->Form->input('event_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Event Activities'), array('action' => 'index')); ?></li>
	</ul>
</div>
