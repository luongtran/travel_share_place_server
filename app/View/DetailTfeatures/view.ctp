<div class="detailTfeatures view">
<h2><?php echo __('Detail Tfeature'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($detailTfeature['DetailTfeature']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('T Feature Id'); ?></dt>
		<dd>
			<?php echo h($detailTfeature['DetailTfeature']['t_feature_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Circumstance Id'); ?></dt>
		<dd>
			<?php echo h($detailTfeature['DetailTfeature']['circumstance_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Classification'); ?></dt>
		<dd>
			<?php echo h($detailTfeature['DetailTfeature']['classification']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Count '); ?></dt>
		<dd>
			<?php echo h($detailTfeature['DetailTfeature']['count_']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Detail Tfeature'), array('action' => 'edit', $detailTfeature['DetailTfeature']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Detail Tfeature'), array('action' => 'delete', $detailTfeature['DetailTfeature']['id']), null, __('Are you sure you want to delete # %s?', $detailTfeature['DetailTfeature']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Detail Tfeatures'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Detail Tfeature'), array('action' => 'add')); ?> </li>
	</ul>
</div>
