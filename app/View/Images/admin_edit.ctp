<div class="images form">
<?php echo $this->Form->create('Image'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Image'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('typeimage_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('place_id');
		echo $this->Form->input('src');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Image.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Image.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Images'), array('action' => 'index')); ?></li>
	</ul>
</div>
