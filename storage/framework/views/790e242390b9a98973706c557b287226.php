<div class="d-flex justify-content-center align-items-center text-center">

    <?php $__empty_1 = true; $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <span><?php echo e($role->name); ?> </span>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <span> Not Role Assigned To User</span>
    <?php endif; ?>
</div>
<?php /**PATH E:\tajeri\resources\views/user/datatable/roles.blade.php ENDPATH**/ ?>