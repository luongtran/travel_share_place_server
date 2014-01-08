<div class="detailTfeatures form">
<?php echo $this->Form->create('DetailTfeature'); ?>
	<fieldset>
		<legend><?php echo __('Add Detail Tfeature'); ?></legend>
	<?php
		echo $this->Form->input('t_feature_id');
		echo $this->Form->input('circumstance_id');
		echo $this->Form->input('classification');
		echo $this->Form->input('count_');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Detail Tfeatures'), array('action' => 'index')); ?></li>
	</ul>
</div>
