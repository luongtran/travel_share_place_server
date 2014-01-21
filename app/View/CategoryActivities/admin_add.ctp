<div class="categoryActivities form">
<?php echo $this->Form->create('CategoryActivity'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Category Activity'); ?></legend>
	<?php
		echo $this->Form->input('cate_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Category Activities'), array('action' => 'index')); ?></li>
	</ul>
</div>
