<div class="categotyActivities view">
<h2><?php echo __('Categoty Activity'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($categotyActivity['CategotyActivity']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category Name'); ?></dt>
		<dd>
			<?php echo h($categotyActivity['CategotyActivity']['category_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Categoty Activity'), array('action' => 'edit', $categotyActivity['CategotyActivity']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Categoty Activity'), array('action' => 'delete', $categotyActivity['CategotyActivity']['id']), null, __('Are you sure you want to delete # %s?', $categotyActivity['CategotyActivity']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Categoty Activities'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categoty Activity'), array('action' => 'add')); ?> </li>
	</ul>
</div>
