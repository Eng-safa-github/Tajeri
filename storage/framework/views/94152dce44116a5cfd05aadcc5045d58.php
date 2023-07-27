<?php $__env->startPush('styles'); ?>


    <link rel="stylesheet"
          type="text/css"
          href="<?php echo e(asset('adminAssets/src/plugins/src/table/datatable/datatables.css')); ?>">

    <link rel="stylesheet"
          type="text/css"
          href="<?php echo e(asset('adminAssets/src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css')); ?>">

<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row layout-spacing my-4">
            <div class="col-lg-12">
                <div class="card ">
                    
                    <div class="card-header d-flex justify-content-between align-items-center ">
                        <h3 class="text-capitalize text-dark">
                            الادوار
                        </h3>
                        <?php if( auth()->user()->can('انشاء-الصلاحيات') ): ?>

                            <a href="<?php echo e(route('roles.create')); ?>" class="icon text-dark">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"
                                     fill="none"
                                     stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="feather feather-user-plus">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="8.5" cy="7" r="4"></circle>
                                    <line x1="20" y1="8" x2="20" y2="14"></line>
                                    <line x1="23" y1="11" x2="17" y2="11"></line>
                                </svg>
                            </a>
                        <?php endif; ?>

                    </div>
                    <div class="card-body">
                        <?php echo $dataTable->table(['class' => 'table table-striped dt-table-hover dataTable text-center' ,'id' => 'DataTable']); ?>


                    </div>
                </div>

            </div>

        </div>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
        <div class="content-backdrop fade"></div>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

    
    <script src="<?php echo e(asset('adminAssets/src/plugins/src/table/datatable/datatables.js')); ?>"></script>
    <script src="<?php echo e(asset('adminAssets/src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js')); ?>">
    </script>
    <script src="<?php echo e(asset('adminAssets/src/plugins/src/table/datatable/custom_miscellaneous.js')); ?>"></script>
    

    <?php echo $dataTable->scripts(); ?>

    

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\tajeri\resources\views/roles/role/index.blade.php ENDPATH**/ ?>