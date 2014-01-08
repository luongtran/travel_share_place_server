<div class="sharePlaces form">
<?php echo $this->Form->create('SharePlace'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Share Place'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('place_id');
		echo $this->Form->input('share_time');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Share Places'), array('action' => 'index')); ?></li>
	</ul>
</div>
