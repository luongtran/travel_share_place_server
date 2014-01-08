<div class="detailTfeatures form">
<?php echo $this->Form->create('DetailTfeature'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Detail Tfeature'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('DetailTfeature.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('DetailTfeature.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Detail Tfeatures'), array('action' => 'index')); ?></li>
	</ul>
</div>
