<?php $__env->startSection('content'); ?>

    <?php if(count($replies) > 0): ?>

        <h1>replies</h1>


        <table class="table">
            <thead>
            <tr>
                <th>id</th>
                <th>Author</th>
                <th>Email</th>
                <th>Body</th>
            </tr>
            </thead>
            <tbody>

            <?php $__currentLoopData = $replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                <tr>
                    <td><?php echo e($reply->id); ?></td>
                    <td><?php echo e($reply->author); ?></td>
                    <td><?php echo e($reply->email); ?></td>
                    <td><?php echo e($reply->body); ?></td>
                    <td><a href="<?php echo e(route('home.post',$reply->comment->post->id)); ?>">View Post</a></td>

                    <td>

                        <?php if($reply->is_active == 1): ?>


                            <?php echo Form::open(['method'=>'PATCH', 'action'=> ['CommentRepliesController@update', $reply->id]]); ?>



                            <input type="hidden" name="is_active" value="0">


                            <div class="form-group">
                                <?php echo Form::submit('Un-approve', ['class'=>'btn btn-success']); ?>

                            </div>
                            <?php echo Form::close(); ?>



                        <?php else: ?>


                            <?php echo Form::open(['method'=>'PATCH', 'action'=> ['CommentRepliesController@update', $reply->id]]); ?>



                            <input type="hidden" name="is_active" value="1">


                            <div class="form-group">
                                <?php echo Form::submit('Approve', ['class'=>'btn btn-info']); ?>

                            </div>
                            <?php echo Form::close(); ?>


                        <?php endif; ?>



                    </td>

                    <td>


                        <?php echo Form::open(['method'=>'DELETE', 'action'=> ['CommentRepliesController@destroy', $reply->id]]); ?>



                        <div class="form-group">
                            <?php echo Form::submit('Delete', ['class'=>'btn btn-danger']); ?>

                        </div>
                        <?php echo Form::close(); ?>




                    </td>


                </tr>


            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>



    <?php else: ?>


        <h1 class="text-center">No replies</h1>



    <?php endif; ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>