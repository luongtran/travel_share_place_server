<div class="sexes form">
<?php echo $this->Form->create('Sex'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Sex'); ?></legend>
	<?php
		echo $this->Form->input('sex_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Sexes'), array('action' => 'index')); ?></li>
	</ul>
</div>
