<div class="sprints index">
	<h2><?php __('Sprints');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php __('id');?></th>
			<th><?php __('name');?></th>
			<th><?php __('description');?></th>
			<th><?php __('startdate');?></th>
			<th><?php __('enddate');?></th>
			<th><?php __('disabled');?></th>
			<th><?php __('created');?></th>
			<th><?php __('updated');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($sprints as $sprint):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $sprint['Sprint']['id']; ?>&nbsp;</td>
		<td><?php echo $sprint['Sprint']['name']; ?>&nbsp;</td>
		<td><?php echo $sprint['Sprint']['description']; ?>&nbsp;</td>
		<td><?php echo $sprint['Sprint']['startdate']; ?>&nbsp;</td>
		<td><?php echo $sprint['Sprint']['enddate']; ?>&nbsp;</td>
		<td><?php echo $sprint['Sprint']['disabled']; ?>&nbsp;</td>
		<td><?php echo $sprint['Sprint']['created']; ?>&nbsp;</td>
		<td><?php echo $sprint['Sprint']['updated']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link($html->image('detail.png'), array('controller' => 'sprints', 'action' => 'view', $sprint['Sprint']['id']), array('escape' => false)); ?>
			<?php echo $this->Html->link($html->image('edit.png'), array('controller' => 'sprints', 'action' => 'edit', $sprint['Sprint']['id']), array('escape' => false)); ?>
			<?php echo $this->Html->link($html->image('delete.png'), array('controller' => 'sprints', 'action' => 'delete', $sprint['Sprint']['id']), array('escape' => false), sprintf(__('Are you sure you want to delete # %s?', true), $sprint['Sprint']['id'])); ?>

		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
