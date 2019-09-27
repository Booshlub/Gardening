<?php $__env->startSection('content'); ?>


    <?php if(Session::has('deleted_user')): ?>


        <p class="bg-danger"><?php echo e(session('deleted_user')); ?></p>


        <?php endif; ?>


    <h1>Users</h1>


    <table class="table">
       <thead>
         <tr>
             <th>Id</th>
             <th>Photo</th>
             <th>Name</th>
             <th>Email</th>
             <th>Role</th>
             <th>Status</th>
             <th>Created</th>
             <th>Updated</th>
          </tr>
        </thead>
        <tbody>

        <?php if($users): ?>


            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


           <tr>
              <td><?php echo e($user->id); ?></td>
               <td> <img height="50" src="<?php echo e($user->photo ? $user->photo->file : 'http://placehold.it/400x400'); ?>" alt="" ></td>
              <td><a href="<?php echo e(route('users.edit', $user->id)); ?>"><?php echo e($user->name); ?></a></td>
              <td><?php echo e($user->email); ?></td>
              <td><?php echo e($user->role ? $user->role->name : 'User has no role'); ?></td>
               <td><?php echo e($user->is_active == 1 ? 'Active' : 'Not Active'); ?></td>
              <td><?php echo e($user->created_at->diffForHumans()); ?></td>
              <td><?php echo e($user->updated_at->diffForHumans()); ?></td>
           </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


          <?php endif; ?>


       </tbody>
     </table>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>