<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEditCategory" aria-labelledby="offcanvasEditCategoryLabel">
    <div class="offcanvas-header border-bottom">
        <h6 id="offcanvasEditCategoryLabel" class="offcanvas-title">تعديل الصنف</h6>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form class="pt-0" id="editCategoryForm" onsubmit="return false" enctype="multipart/form-data" method="post">
            <?php echo e(method_field('PUT')); ?>

            <input type="hidden" id="categoryId-edit" name="id"/>
            <div class="mb-3">
                <label class="form-label" for="categoryName-edit">الاسم</label>
                <input type="text" class="form-control" id="categoryName-edit" name="name"/>
            </div>
            <button type="submit" class="btn btn-primary data-submit me-1 me-sm-3">تعديل</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">إغلاق</button>
        </form>
    </div>
</div>
<?php /**PATH D:\laravelProjects\Tajeri-web\resources\views/categories/edit.blade.php ENDPATH**/ ?>