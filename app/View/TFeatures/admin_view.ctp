<div class="tFeatures view">
<h2><?php echo __('T Feature'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tFeature['TFeature']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('F Name'); ?></dt>
		<dd>
			<?php echo h($tFeature['TFeature']['f_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Feature Id'); ?></dt>
		<dd>
			<?php echo h($tFeature['TFeature']['feature_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit T Feature'), array('action' => 'edit', $tFeature['TFeature']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete T Feature'), array('action' => 'delete', $tFeature['TFeature']['id']), null, __('Are you sure you want to delete # %s?', $tFeature['TFeature']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List T Features'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New T Feature'), array('action' => 'add')); ?> </li>
	</ul>
</div>
