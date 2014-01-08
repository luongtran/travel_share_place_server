<div class="places form">
<?php echo $this->Form->create('Place'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Place'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('address');
		echo $this->Form->input('place_name');
		echo $this->Form->input('p_like');
		echo $this->Form->input('p_view');
		echo $this->Form->input('p_time');
		echo $this->Form->input('longitude');
		echo $this->Form->input('latitude');
		echo $this->Form->input('district_id');
		echo $this->Form->input('rate');
		echo $this->Form->input('website');
		echo $this->Form->input('mobile');
		echo $this->Form->input('description');
		echo $this->Form->input('tplace_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Place.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Place.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Places'), array('action' => 'index')); ?></li>
	</ul>
</div>
