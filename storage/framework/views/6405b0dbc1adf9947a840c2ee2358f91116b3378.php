 
 
<?php $__env->startSection('content'); ?>
 
    <?php if(Session::has('comment_message')): ?>
 
        <p class="alert alert-success"><?php echo e(session('comment_message')); ?></p>
    <?php endif; ?>
 
    <!-- Blog Post -->
 
    <!-- Title -->
    <h1><?php echo e($post->title); ?></h1>
 
    <!-- Author -->
    <p class="lead">
        by <a href="#"><?php echo e($post->name); ?></a>
    </p>
 
    <hr>
 
    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted <?php echo e($post->created_at->diffForHumans()); ?></p>
    <hr>
 
    <!-- Preview Image -->
    <?php $__currentLoopData = $post->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<img height="100" src="<?php echo e(asset($photo->file)); ?>" alt="Blah">
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <hr>
 
    <!-- Post Content -->
    <p><?php echo e($post->body); ?></p>
 
    <hr>
 
    <!-- Blog Comments -->
 
 
 
 
    <!-- Comments Form -->
    <div>
 
        <form action="<?php echo e(action('PostCommentsController@store')); ?>" method="POST">
			<?php echo e(csrf_field()); ?>

            <input type="hidden" name="post_id" value="<?php echo e($post->id); ?>">
 
            <div class="form-group">
 
                <label for="body">Comment</label>
                <textarea name="body" rows="5" class="form-control"></textarea>
 
            </div>
 
 
            <div class="form-group">
 
                <button class="btn btn-primary" name="btn_leave_comment">Comment</button>
 
            </div>
 
        </form>
 
    </div>
 
 
    <hr>
 
    <!-- Posted Comments -->
 
    <?php if(count($comments) > 0): ?>
 
        <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 
            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img style="height: 64px;" class="media-object" src="<?php echo e(asset($comment->photo) ? asset($comment->photo) : 'images/default.jpg'); ?>" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><?php echo e($comment->author); ?>

                        <small><?php echo e($comment->created_at->diffForHumans()); ?></small>
					</h4>
                    <?php echo e($comment->body); ?>

 
                   <?php if(count($comment->replies) > 0): ?>
 
                       <?php $__currentLoopData = $comment->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 
 
                            <!-- Nested Comment -->
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object" height="40px" src="<?php echo e($reply->photo); ?>" alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading"><?php echo e($reply->author); ?>

                                        <small><?php echo e($reply->created_at->diffForHumans()); ?></small>
                                    </h4>
                                    <p><?php echo e($reply->body); ?></p>
                                </div>
 
								
 
									
 
									
 
										
								
 
								
 
								
 
								
 
 
                            <!-- End Nested Comment -->
 
                           </div>
 
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 
                   <?php endif; ?>
 
                </div>
 
            <div class="comment-reply-container">
 
                <button class="toggle-reply btn btn-primary pull-right">Reply</button>
 
                <div class="comment-reply">
 
                    <br>
						<form action="<?php echo e(action('CommentRepliesController@createReply')); ?>" method="POST">
							<?php echo e(csrf_field()); ?>

 
                        <input type="hidden" name="comment_id" value="<?php echo e($comment->id); ?>">
 
 
                        <div class="form-group">
 
                            <label for="body">Reply</label>
                            <textarea name="body" rows="2" class="form-control"></textarea>
 
                        </div>
 
                        <button class="btn btn-primary" name="btn_create_reply">Reply</button>
 
                    </form>
 
                </div>
 
            </div>
 
            </div>
 
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 
    <?php endif; ?>
 
 
<?php $__env->stopSection(); ?>
 
<?php $__env->startSection('scripts'); ?>
 
    <script>
 
        $(".comment-reply-container .toggle-reply").click(function(){
           $(this).next().slideToggle("slow");
 
        });
 
    </script>
 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.blog-post', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>