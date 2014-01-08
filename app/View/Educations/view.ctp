<div class="educations view">
<h2><?php echo __('Education'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($education['Education']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Education Name'); ?></dt>
		<dd>
			<?php echo h($education['Education']['education_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Education'), array('action' => 'edit', $education['Education']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Education'), array('action' => 'delete', $education['Education']['id']), null, __('Are you sure you want to delete # %s?', $education['Education']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Educations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Education'), array('action' => 'add')); ?> </li>
	</ul>
</div>
