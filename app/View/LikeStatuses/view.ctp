<div class="likeStatuses view">
<h2><?php echo __('Like Status'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($likeStatus['LikeStatus']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
			<?php echo h($likeStatus['LikeStatus']['user_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status Id'); ?></dt>
		<dd>
			<?php echo h($likeStatus['LikeStatus']['status_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Like Time'); ?></dt>
		<dd>
			<?php echo h($likeStatus['LikeStatus']['like_time']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Like Status'), array('action' => 'edit', $likeStatus['LikeStatus']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Like Status'), array('action' => 'delete', $likeStatus['LikeStatus']['id']), null, __('Are you sure you want to delete # %s?', $likeStatus['LikeStatus']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Like Statuses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Like Status'), array('action' => 'add')); ?> </li>
	</ul>
</div>
