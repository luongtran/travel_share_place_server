<div class="placeFavorites form">
<?php echo $this->Form->create('PlaceFavorite'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Place Favorite'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('place_id');
		echo $this->Form->input('place_fav_time');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('PlaceFavorite.user_id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('PlaceFavorite.user_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Place Favorites'), array('action' => 'index')); ?></li>
	</ul>
</div>
