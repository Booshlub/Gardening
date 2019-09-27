<?php $__env->startSection('content'); ?>

<h1>Create Users</h1>

<?php echo Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store', 'files'=>true]); ?>


<div class="form-group">
	<?php echo Form::label('name', 'Name:'); ?>

	<?php echo Form::text('name', null, ['class'=>'form-control']); ?>

</div>

<div class="form-group">
	<?php echo Form::label('is_active', 'Status:'); ?>

	<?php echo Form::select('is_active', array(1=> 'Active', 0=>'Not Active'), null, ['class'=>'form-control']); ?>

</div>

<div class="form-group">
	<?php echo Form::label('photo_id', 'Photo:'); ?>

	<?php echo Form::file('photo_id', null, ['class'=>'form-control']); ?>

</div>

<div class="form-group">
	<?php echo Form::label('role_id', 'Role:'); ?>

	<?php echo Form::select('role_id', [''=>'Choose Options'] + $roles, null, ['class'=>'form-control']); ?>

</div>

<div class="form-group">
	<?php echo Form::label('email', 'Email:'); ?>

	<?php echo Form::email('email', null, ['class'=>'form-control']); ?>

</div>

<div class="form-group">
	<?php echo Form::label('password', 'Password:'); ?>

	<?php echo Form::text('password', null, ['class'=>'form-control']); ?>

</div>

<div class="form-group">
	<?php echo Form::submit('Create User', ['class'=>'btn btn-primary']); ?>

</div>


<?php echo Form::close(); ?>


<?php echo $__env->make('includes.form_error', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>