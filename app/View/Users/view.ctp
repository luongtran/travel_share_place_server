<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('L Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['l_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('F Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['f_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Preference'); ?></dt>
		<dd>
			<?php echo h($user['User']['preference']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Job'); ?></dt>
		<dd>
			<?php echo h($user['User']['job']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($user['User']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Motto'); ?></dt>
		<dd>
			<?php echo h($user['User']['motto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Relationship Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['relationship_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sex Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['sex_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Education Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['education_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Decentralization Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['decentralization_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Workplace'); ?></dt>
		<dd>
			<?php echo h($user['User']['workplace']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Birth'); ?></dt>
		<dd>
			<?php echo h($user['User']['birth']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
	</ul>
</div>
