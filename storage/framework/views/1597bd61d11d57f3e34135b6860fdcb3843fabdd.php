<?php $__env->startSection('content'); ?>


    <h1>Edit Post</h1>

	

    <div class="row">
		<div class="col-sm-6">
			<img height="100" src="<?php echo e(asset($post->photo->file)); ?>" class="img-responsive">
		</div>
		
         <?php echo Form::model($post,['method'=>'PATCH', 'action'=> ['AdminPostsController@update', $post->id], 'files'=>true]); ?>


           <div class="form-group">
                 <?php echo Form::label('title', 'Title:'); ?>

                 <?php echo Form::text('title', null, ['class'=>'form-control']); ?>

           </div>

            <div class="form-group">
                <?php echo Form::label('category_id', 'Category:'); ?>

                <?php echo Form::select('category_id', $categories, null, ['class'=>'form-control']); ?>

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
                <?php echo Form::submit('Edit Post', ['class'=>'btn btn-primary col-sm-8']); ?>

             </div>

           <?php echo Form::close(); ?>

		
		<?php echo Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id]]); ?>

		<div class="form-group">
			<?php echo Form::submit('Delete Post', ['class'=>'btn btn-danger']); ?>

		</div>
		<?php echo Form::close(); ?>


    </div>


    <div class="row">


        <?php echo $__env->make('includes.form_error', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>



    </div>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>