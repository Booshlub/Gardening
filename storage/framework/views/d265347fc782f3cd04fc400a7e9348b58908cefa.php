 
<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css">
<?php $__env->stopSection(); ?>
 
<?php $__env->startSection('content'); ?>
 
<h1>Upload Media</h1>
<?php echo Form::open(['method'=>'POST', 'action'=>'AdminMediaController@store', 'class'=>'dropzone']); ?>

 
<?php echo Form::close(); ?>

 
<?php $__env->stopSection(); ?>
 
<?php $__env->startSection('scripts'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>