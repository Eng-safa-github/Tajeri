<?php $__env->startSection('content'); ?>
    <div class="container-fluid">

        <div class="row my-3">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-bottom:24px;">
                <form method="POST" action="<?php echo e(route('roles.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="card">
                        <div class="card-header">
                            <h3>Create User</h3>
                        </div>
                        <div class="card-body row">
                            <div class="col-md-12 mb-3">
                                <div class="card">
                                    <div class="card-header fw-bolder">Role Info</div>
                                    <div class="card-body row">
                                        <div class="col-md-12">
                                            <div class="form-group  callout callout-left-primary">
                                                <label for="name" class="col-form-label">Role Name</label>
                                                <input class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                       name="name"
                                                       type="text"
                                                       id="name"
                                                       value="<?php echo e(old('name')); ?>"
                                                       placeholder="Enter Role Name"/>

                                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <p class="text-danger my-2"> <?php echo e($message); ?></p>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header fw-bolder">Assign Permissions To This Role</div>
                                    <div class="card-body">

                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                <tr>
                                                    <th scope="col">Table</th>
                                                    <th scope="col">عرض الكل</th>
                                                    <th class="text-center" scope="col">انشاء</th>
                                                    <th class="text-center" scope="col">اظهار</th>
                                                    <th class="text-center" scope="col">تحديث</th>
                                                    <th class="text-center" scope="col">حذف</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $__currentLoopData = $tables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $table): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td class="d-flex">
                                                            <div
                                                                class="form-check form-check-primary form-check-inline mr-5 ">

                                                                <input class="form-check-input checkAll"
                                                                       type="checkbox"
                                                                       id="checkAll_<?php echo e($table); ?>"
                                                                       data-table="<?php echo e($table); ?>">

                                                            </div>
                                                            <p>
                                                                <?php echo e($table); ?>

                                                            </p>
                                                        </td>
                                                        <td>
                                                            <div
                                                                class="form-check form-check-primary form-check-inline">
                                                                <input class="form-check-input permission_<?php echo e($table); ?>"
                                                                       type="checkbox"
                                                                       onchange="changeCheckAllButtonStatus('<?php echo e($table); ?>')"
                                                                       data-permission="permission_<?php echo e($table); ?>"
                                                                       name="permissions[عرض الكل-<?php echo e($table); ?>]"
                                                                    <?php if(old('permissions') !== null &&  array_key_exists('عرض الكل-' . $table ,old('permissions'))): echo 'checked'; endif; ?>>


                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div
                                                                class="form-check form-check-primary form-check-inline">
                                                                <input class="form-check-input permission_<?php echo e($table); ?>"
                                                                       type="checkbox"
                                                                       onchange="changeCheckAllButtonStatus('<?php echo e($table); ?>')"
                                                                       data-permission="permission_<?php echo e($table); ?>"
                                                                       name="permissions[انشاء-<?php echo e($table); ?>]"
                                                                    <?php if(old('permissions') !== null &&  array_key_exists('انشاء-' . $table ,old('permissions'))): echo 'checked'; endif; ?>>

                                                            </div>
                                                        </td>

                                                        <td>
                                                            <div
                                                                class="form-check form-check-primary form-check-inline">
                                                                <input class="form-check-input permission_<?php echo e($table); ?>"
                                                                       type="checkbox"
                                                                       onchange="changeCheckAllButtonStatus('<?php echo e($table); ?>')"
                                                                       data-permission="permission_<?php echo e($table); ?>"
                                                                       name="permissions[اظهار-<?php echo e($table); ?>]"
                                                                    <?php if(old('permissions') !== null &&  array_key_exists('اظهار-' . $table ,old('permissions'))): echo 'checked'; endif; ?>>

                                                            </div>
                                                        </td>

                                                        <td>
                                                            <div
                                                                class="form-check form-check-primary form-check-inline">
                                                                <input class="form-check-input permission_<?php echo e($table); ?>"
                                                                       type="checkbox"
                                                                       onchange="changeCheckAllButtonStatus('<?php echo e($table); ?>')"
                                                                       data-permission="permission_<?php echo e($table); ?>"
                                                                       name="permissions[تحديث-<?php echo e($table); ?>]"
                                                                    <?php if(old('permissions') !== null &&  array_key_exists('تحديث-' . $table ,old('permissions'))): echo 'checked'; endif; ?>>

                                                            </div>
                                                        </td>

                                                        <td>
                                                            <div
                                                                class="form-check form-check-primary form-check-inline">
                                                                <input class="form-check-input permission_<?php echo e($table); ?>"
                                                                       type="checkbox"
                                                                       onchange="changeCheckAllButtonStatus('<?php echo e($table); ?>')"
                                                                       data-permission="permission_<?php echo e($table); ?>"
                                                                       name="permissions[حذف-<?php echo e($table); ?>]"
                                                                    <?php if(old('permissions') !== null &&  array_key_exists('حذف-' . $table ,old('permissions'))): echo 'checked'; endif; ?>>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-outline-primary btn-lg text-capitalize fw-bold">create
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

    <script>

        $('.checkAll').on('change', function () {
            let table = $(this).data('table')
            if ($(this).prop('checked')) {
                $('.permission_' + table).prop('checked', true);
            } else {
                $('.permission_' + table).prop('checked', false);
            }
        });

        function changeCheckAllButtonStatus(tableName) {

            if ($('.permission_' + `${tableName}:checked`).length === 5) {
                $('#checkAll_' + tableName).prop('checked', true)
            } else {
                $('#checkAll_' + tableName).prop('checked', false)
            }
        }


        function checkIfCheckAllButtonChecked(tableName) {

            if ($('.permission_' + `${tableName}:checked`).length === 5) {
                $('#checkAll_' + tableName).prop('checked', true)
            } else {
                $('#checkAll_' + tableName).prop('checked', false)
            }
        }
    </script>
<?php $__env->stopPush(); ?>



<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\tajeri\resources\views/roles/role/create.blade.php ENDPATH**/ ?>