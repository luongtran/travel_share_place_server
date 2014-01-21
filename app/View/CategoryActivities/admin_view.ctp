<div class="categoryActivities view">
<h2><?php echo __('Category Activity'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($categoryActivity['CategoryActivity']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cate Name'); ?></dt>
		<dd>
			<?php echo h($categoryActivity['CategoryActivity']['cate_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Category Activity'), array('action' => 'edit', $categoryActivity['CategoryActivity']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Category Activity'), array('action' => 'delete', $categoryActivity['CategoryActivity']['id']), null, __('Are you sure you want to delete # %s?', $categoryActivity['CategoryActivity']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Category Activities'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category Activity'), array('action' => 'add')); ?> </li>
	</ul>
</div>
