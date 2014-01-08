<div class="tPlaces form">
<?php echo $this->Form->create('TPlace'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add T Place'); ?></legend>
	<?php
		echo $this->Form->input('type_place');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List T Places'), array('action' => 'index')); ?></li>
	</ul>
</div>
