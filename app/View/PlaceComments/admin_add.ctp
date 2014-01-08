<div class="placeComments form">
<?php echo $this->Form->create('PlaceComment'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Place Comment'); ?></legend>
	<?php
		echo $this->Form->input('messege');
		echo $this->Form->input('place_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('comment_time');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Place Comments'), array('action' => 'index')); ?></li>
	</ul>
</div>
