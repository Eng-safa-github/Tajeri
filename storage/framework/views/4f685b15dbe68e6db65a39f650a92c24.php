<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddCategory" aria-labelledby="offcanvasAddCategoryLabel">
    <div class="offcanvas-header border-bottom">
        <h6 id="offcanvasAddCategoryLabel" class="offcanvas-title">إضافة صنف جديد</h6>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form class="pt-0" id="addNewCategoryForm" onsubmit="return false" method="post">
            <div class="mb-3">
                <label class="form-label" for="add-category-name">اسم الصنف</label>
                <input type="text" class="form-control" id="add-category-name" name="name"/>
            </div>

            <button type="submit" class="btn btn-primary data-submit me-1 me-sm-3">حفظ</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">إغلاق</button>
        </form>
    </div>
</div>
<?php /**PATH D:\laravelProjects\Tajeri-web\resources\views/categories/add.blade.php ENDPATH**/ ?>