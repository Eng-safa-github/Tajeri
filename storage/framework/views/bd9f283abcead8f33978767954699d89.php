<?php use App\Enums\ProductUnitEnum; ?>
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEditStoreProduct"
     aria-labelledby="offcanvasEditStoreProductLabel">
    <div class="offcanvas-header border-bottom">
        <h6 id="offcanvasEditStoreProductLabel" class="offcanvas-title">تعديل المنتج</h6>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form class="pt-0" id="editStoreProductForm" onsubmit="return false" enctype="multipart/form-data" method="post">
            <?php echo e(method_field('PUT')); ?>

            <input type="hidden" id="id_store" name="id_store">
            <div class="mb-3" id="edit-product-parent">
                <label class="form-label" for="product-edit">المنتج</label>
                <select id="product-edit" class=" form-select form-control" name="product_id"></select>
                <label id="category-error" class="error" for="product"></label>
            </div>
            <div class="mb-3">
                <label for="unit-edit" class="form-label">الوحدة</label>
                <select id="unit-edit" class="select form-select form-select" data-allow-clear="true" name="unit-edit">
                    <?php $__currentLoopData = ProductUnitEnum::cases(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($label); ?>"><?php echo e($label); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="purchasing_price_edit">سعر شراء الوحدة</label>
                <input type="number" class="form-control" id="purchasing_price_edit" name="purchasing_price_edit"/>
            </div>
            <div class="mb-3">
                <label class="form-label" for="unit_price_edit">سعر بيع الوحدة</label>
                <input type="number" class="form-control" id="unit_price_edit" name="unit_price_edit"/>
            </div>
            <div class="mb-3">
                <label class="form-label" for="production_date_edit">تاريخ الانتاج</label>
                <input type="date" class="form-control" id="production_date_edit" name="production_date_edit"/>
            </div>
            <div class="mb-3">
                <label class="form-label" for="expiry_date_edit">تاريخ الانتهاء</label>
                <input type="date" class="form-control" id="expiry_date_edit" name="expiry_date_edit"/>
            </div>
            <div class="mb-3">
                <label class="form-label" for="quantity_edit">الكمية</label>
                <input type="number" class="form-control" id="quantity_edit" name="quantity_edit"/>
            </div>

            <button type="submit" class="btn btn-primary data-submit me-1 me-sm-3">حفظ</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">إغلاق</button>
        </form>
    </div>
</div>
<?php /**PATH D:\laravelProjects\newProject\resources\views/users/edit.blade.php ENDPATH**/ ?>