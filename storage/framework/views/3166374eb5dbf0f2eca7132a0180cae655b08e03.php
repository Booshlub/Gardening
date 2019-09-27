<?php $__env->startSection('content'); ?>


    <h1>Create Post</h1>

    <div class="row">
         <?php echo Form::open(['method'=>'POST', 'action'=> 'AdminPostsController@store', 'files'=>true]); ?>


           <div class="form-group">
                 <?php echo Form::label('title', 'Title:'); ?>

                 <?php echo Form::text('title', null, ['class'=>'form-control']); ?>

           </div>

            <div class="form-group">
                <?php echo Form::label('category_id', 'Category:'); ?>

                <?php echo Form::select('category_id', [''=>'Choose Categories']+ $categories, null, ['class'=>'form-control']); ?>

            </div>

            <div class="form-group">
                <?php echo Form::label('photo_id', 'Photo:'); ?>

                <?php echo Form::file('photo_id', null,['class'=>'form-control']); ?>

             </div>


            <div class="form-group">
                <?php echo Form::label('body', 'Description:'); ?>

                <?php echo Form::textarea('body', null, ['class'=>'form-control']); ?>

            </div>




             <div class="form-group">
                <?php echo Form::submit('Create Post', ['class'=>'btn btn-primary']); ?>

             </div>

           <?php echo Form::close(); ?>


    </div>


    <div class="row">


        <?php echo $__env->make('includes.form_error', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>



    </div>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>