<div class="likePlaces view">
<h2><?php echo __('Like Place'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($likePlace['LikePlace']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
			<?php echo h($likePlace['LikePlace']['user_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Place Id'); ?></dt>
		<dd>
			<?php echo h($likePlace['LikePlace']['place_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Like Time'); ?></dt>
		<dd>
			<?php echo h($likePlace['LikePlace']['like_time']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Like Place'), array('action' => 'edit', $likePlace['LikePlace']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Like Place'), array('action' => 'delete', $likePlace['LikePlace']['id']), null, __('Are you sure you want to delete # %s?', $likePlace['LikePlace']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Like Places'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Like Place'), array('action' => 'add')); ?> </li>
	</ul>
</div>
