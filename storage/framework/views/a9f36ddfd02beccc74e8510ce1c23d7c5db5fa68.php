<?php $__env->startSection('content'); ?>

<h1>Categories</h1>

<div class="col-sm6">
	<div class="sm-6">
		<?php echo Form::model($category, ['method'=>'PATCH', 'action'=> ['AdminCategoriesController@update', $category->id]]); ?>

		<div class="form-group">
			<?php echo Form::label('name', 'Name: '); ?>

			<?php echo Form::text('name', null, ['class'=>'form-control']); ?>

		</div>
		<div class="form-group">
			<?php echo Form::submit('Edit Category', ['class'=>'btn btn-primary']); ?>

		</div>
		<?php echo Form::close(); ?>

	</div>
</div>

<div class="col-sm6">
	<?php echo Form::model($category, ['method'=>'DELETE', 'action'=> ['AdminCategoriesController@destroy', $category->id]]); ?>

		<div class="form-group">
			<?php echo Form::submit('Delete', ['class'=>'btn btn-danger']); ?>

		</div>
		<?php echo Form::close(); ?>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>