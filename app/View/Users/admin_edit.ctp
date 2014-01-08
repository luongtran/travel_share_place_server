<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('l_name');
		echo $this->Form->input('f_name');
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('preference');
		echo $this->Form->input('job');
		echo $this->Form->input('address');
		echo $this->Form->input('motto');
		echo $this->Form->input('relationship_id');
		echo $this->Form->input('sex_id');
		echo $this->Form->input('education_id');
		echo $this->Form->input('decentralization_id');
		echo $this->Form->input('workplace');
		echo $this->Form->input('birth');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
	</ul>
</div>
