<div class="categotyActivities form">
<?php echo $this->Form->create('CategotyActivity'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Categoty Activity'); ?></legend>
	<?php
		echo $this->Form->input('category_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Categoty Activities'), array('action' => 'index')); ?></li>
	</ul>
</div>
