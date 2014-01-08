<div class="categotyActivities form">
<?php echo $this->Form->create('CategotyActivity'); ?>
	<fieldset>
		<legend><?php echo __('Edit Categoty Activity'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('category_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CategotyActivity.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('CategotyActivity.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Categoty Activities'), array('action' => 'index')); ?></li>
	</ul>
</div>
