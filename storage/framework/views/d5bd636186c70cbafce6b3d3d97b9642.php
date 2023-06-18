<?php $__env->startSection('content'); ?>


<?php if(session()->has('Add')): ?>
    <script>
        window.onload = function() {
            notif({
                msg: " تم اضافة الصلاحية بنجاح",
                type: "success"
            });
        }

    </script>
<?php endif; ?>

<?php if(session()->has('edit')): ?>
    <script>
        window.onload = function() {
            notif({
                msg: " تم تحديث بيانات الصلاحية بنجاح",
                type: "success"
            });
        }

    </script>
<?php endif; ?>

<?php if(session()->has('delete')): ?>
    <script>
        window.onload = function() {
            notif({
                msg: " تم حذف الصلاحية بنجاح",
                type: "error"
            });
        }

    </script>
<?php endif; ?>

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="breadcrumb-wrapper py-3 mb-4"><span class="text-muted fw-light">المستخدم /</span> إدارة المستخدم
            </h4>
            <!-- DataTable with Buttons -->
            <div class="card">
                <div class="card-datatable table-responsive pt-0">
                <table id="rolesDatatable" class="datatables-basic table table-bordered">
                        <thead>
                            <tr>
                                <th>الرقم</th>
                                <th>الاسم</th>
                            </tr>
                        </thead>
                    </table>


                </div>
            </div>

            <!-- BEGIN: Modal-->
            <?php echo $__env->make('roles.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- END: Modal-->

            <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
        <?php $__env->startPush('scripts'); ?>
            <script src="<?php echo e(asset('js/roles.js')); ?>"></script>
        <?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravelProjects\newProject\resources\views/roles/index.blade.php ENDPATH**/ ?>