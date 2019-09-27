<?php $__env->startSection('content'); ?>

<h1>Categories</h1>

<div class="col-sm6">
	<div class="sm-6">
		<?php echo Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']); ?>

		<div class="form-group">
			<?php echo Form::label('name', 'Name: '); ?>

			<?php echo Form::text('name', null, ['class'=>'form-control']); ?>

		</div>
		<div class="form-group">
			<?php echo Form::submit('Create Category', ['class'=>'btn btn-primary']); ?>

		</div>
		<?php echo Form::close(); ?>

	</div>
</div>

<div class="col-sm6">

	<?php if($categories): ?>
	<table>
		<thead>
			<th>id</th>
			<th>Name</th>
			<th>Created</th>
		</thead>
		<tbody>
			<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($category->id); ?></td>
				<td><a href="<?php echo e(route('categories.edit', $category->id)); ?>"><?php echo e($category->name); ?></a></td>
				<td><?php echo e($category->created_at ? $category->created_at->diffForHumans() : 'No Date Here'); ?></td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
	<?php endif; ?>
	
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>