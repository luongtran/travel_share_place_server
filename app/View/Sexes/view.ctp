<div class="sexes view">
<h2><?php echo __('Sex'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($sex['Sex']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sex Name'); ?></dt>
		<dd>
			<?php echo h($sex['Sex']['sex_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Sex'), array('action' => 'edit', $sex['Sex']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Sex'), array('action' => 'delete', $sex['Sex']['id']), null, __('Are you sure you want to delete # %s?', $sex['Sex']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Sexes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sex'), array('action' => 'add')); ?> </li>
	</ul>
</div>
