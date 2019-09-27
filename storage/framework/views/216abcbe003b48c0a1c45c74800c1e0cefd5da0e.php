<?php $__env->startSection('content'); ?>
<h1>Posts Index</h1>


<?php if($posts): ?>
<table>
	<thead>
         <tr>
             <th>Id</th>
             <th>Photo</th>
             <th>Owner</th>
             <th>Category</th>
             <th>Title</th>
             <th>body</th>
             <th>Post link</th>
             <th>Comments</th>
             <th>Created at</th>
             <th>Update</th>
          </tr>
        </thead>
        <tbody>
	<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<tr>
		<td><?php echo e($post->id); ?></td>
		<td>
			<img height="100" src="<?php echo e($post->photo ? asset($post->photo->file) : 'http://placeholder.it/400x400'); ?>" alt="Blah">
		</td>
		<td><?php echo e($post->user->name); ?></td>
		<td><?php echo e($post->category ? $post->category->name : 'Uncategorized'); ?></td>
		<td><a href="<?php echo e(route('posts.edit', ['id' => $post->id])); ?>"><?php echo e($post->title); ?></a></td>
		<td><?php echo e($post->body); ?></td>
		<td><a href="<?php echo e(route('home.post', $post->id)); ?>">View Post</a></td>
		<td><a href="<?php echo e(route('comments.show', $post->id)); ?>">View Comments</a></td>
		<td></td>
		<td><?php echo e($post->created_at->diffForHumans()); ?></td>
	</tr>
</table>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>