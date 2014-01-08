<div class="tPlaces view">
<h2><?php echo __('T Place'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tPlace['TPlace']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type Place'); ?></dt>
		<dd>
			<?php echo h($tPlace['TPlace']['type_place']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit T Place'), array('action' => 'edit', $tPlace['TPlace']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete T Place'), array('action' => 'delete', $tPlace['TPlace']['id']), null, __('Are you sure you want to delete # %s?', $tPlace['TPlace']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List T Places'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New T Place'), array('action' => 'add')); ?> </li>
	</ul>
</div>
