<div class="tFeatures form">
<?php echo $this->Form->create('TFeature'); ?>
	<fieldset>
		<legend><?php echo __('Add T Feature'); ?></legend>
	<?php
		echo $this->Form->input('f_name');
		echo $this->Form->input('feature_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List T Features'), array('action' => 'index')); ?></li>
	</ul>
</div>
