<?php $__env->startSection('content'); ?>

<h1>Media</h1>

<table class="table">
	<thead>
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Created</th>
		</tr>
	</thead>
	<tbody>
		<?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<tr>
			<td><?php echo e($photo->id); ?></td>
			<td><img height="100" src="<?php echo e(asset($photo->file)); ?>"></td>
			<td><?php echo e($photo->created_at ? $photo->created_at : 'No Date'); ?></td>
			<td>
				 <?php echo Form::open(['method'=>'DELETE', 'action'=> ['AdminMediaController@destroy', $photo->id]]); ?>

             <div class="form-group">
                <?php echo Form::submit('Delete Image', ['class'=>'btn btn-primary']); ?>

             </div>

           <?php echo Form::close(); ?>

			</td>
		</tr>		
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</tbody>
</table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>