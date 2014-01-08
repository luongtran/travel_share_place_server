<div class="tPlaces form">
<?php echo $this->Form->create('TPlace'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit T Place'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('type_place');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('TPlace.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('TPlace.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List T Places'), array('action' => 'index')); ?></li>
	</ul>
</div>
