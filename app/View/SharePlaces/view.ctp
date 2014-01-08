<div class="sharePlaces view">
<h2><?php echo __('Share Place'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($sharePlace['SharePlace']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
			<?php echo h($sharePlace['SharePlace']['user_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Place Id'); ?></dt>
		<dd>
			<?php echo h($sharePlace['SharePlace']['place_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Share Time'); ?></dt>
		<dd>
			<?php echo h($sharePlace['SharePlace']['share_time']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Share Place'), array('action' => 'edit', $sharePlace['SharePlace']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Share Place'), array('action' => 'delete', $sharePlace['SharePlace']['id']), null, __('Are you sure you want to delete # %s?', $sharePlace['SharePlace']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Share Places'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Share Place'), array('action' => 'add')); ?> </li>
	</ul>
</div>
