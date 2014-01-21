<div class="viewPlaces form">
<?php echo $this->Form->create('ViewPlace'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit View Place'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('place_id');
		echo $this->Form->input('view_time');
		echo $this->Form->input('view_count');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ViewPlace.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ViewPlace.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List View Places'), array('action' => 'index')); ?></li>
	</ul>
</div>
