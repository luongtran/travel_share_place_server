<div class="circumstanceFeatures view">
<h2><?php echo __('Circumstance Feature'); ?></h2>
	<dl>
		<dt><?php echo __('Feature Id'); ?></dt>
		<dd>
			<?php echo h($circumstanceFeature['CircumstanceFeature']['feature_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Circumstance Id'); ?></dt>
		<dd>
			<?php echo h($circumstanceFeature['CircumstanceFeature']['circumstance_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Circumstance Feature'), array('action' => 'edit', $circumstanceFeature['CircumstanceFeature']['feature_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Circumstance Feature'), array('action' => 'delete', $circumstanceFeature['CircumstanceFeature']['feature_id']), null, __('Are you sure you want to delete # %s?', $circumstanceFeature['CircumstanceFeature']['feature_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Circumstance Features'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Circumstance Feature'), array('action' => 'add')); ?> </li>
	</ul>
</div>
