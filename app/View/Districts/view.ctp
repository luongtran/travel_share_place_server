<div class="districts view">
<h2><?php echo __('District'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($district['District']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('District Name'); ?></dt>
		<dd>
			<?php echo h($district['District']['district_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City Id'); ?></dt>
		<dd>
			<?php echo h($district['District']['city_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit District'), array('action' => 'edit', $district['District']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete District'), array('action' => 'delete', $district['District']['id']), null, __('Are you sure you want to delete # %s?', $district['District']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Districts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New District'), array('action' => 'add')); ?> </li>
	</ul>
</div>
