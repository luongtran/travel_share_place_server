<div class="circumstanceFeatures form">
<?php echo $this->Form->create('CircumstanceFeature'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Circumstance Feature'); ?></legend>
	<?php
		echo $this->Form->input('feature_id');
		echo $this->Form->input('circumstance_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CircumstanceFeature.feature_id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('CircumstanceFeature.feature_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Circumstance Features'), array('action' => 'index')); ?></li>
	</ul>
</div>
