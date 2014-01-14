<div class="placeFavorites view">
<h2><?php echo __('Place Favorite'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($placeFavorite['PlaceFavorite']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
			<?php echo h($placeFavorite['PlaceFavorite']['user_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Place Id'); ?></dt>
		<dd>
			<?php echo h($placeFavorite['PlaceFavorite']['place_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Favorite Time'); ?></dt>
		<dd>
			<?php echo h($placeFavorite['PlaceFavorite']['favorite_time']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Place Favorite'), array('action' => 'edit', $placeFavorite['PlaceFavorite']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Place Favorite'), array('action' => 'delete', $placeFavorite['PlaceFavorite']['id']), null, __('Are you sure you want to delete # %s?', $placeFavorite['PlaceFavorite']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Place Favorites'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place Favorite'), array('action' => 'add')); ?> </li>
	</ul>
</div>
