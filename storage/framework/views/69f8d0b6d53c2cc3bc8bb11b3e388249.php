<?php use App\Enums\DeliveryTypeEnum;use App\Enums\OrderStatusEnum; ?>
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEditOrder" aria-labelledby="offcanvasEditOrderLabel">
    <div class="offcanvas-header border-bottom">
        <h6 id="offcanvasEditOrderLabel" class="offcanvas-title">تعديل حالة الطلب</h6>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form class="pt-0" id="editOrderForm" onsubmit="return false" enctype="multipart/form-data" method="post">
            <?php echo method_field('PUT'); ?>

            <input type="hidden" id="orderId" name="id"/>

            <div class="mb-3">
                <label class="form-label" for="delivery_type_edit">الية التوصيل</label>
                <select id="delivery_type_edit" class="form-select" name="delivery_type">
                    <?php
                    foreach (DeliveryTypeEnum::cases() as $deliveryType) {
                        echo '<option value="' . $deliveryType->value . '">' . $deliveryType->value . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="status_edit">حالة الطلب</label>
                <select id="status_edit" class="form-select" name="status">
                    <?php
                    foreach (OrderStatusEnum::cases() as $status) {
                        echo '<option value="' . $status->value . '">' . $status->value . '</option>';
                    }
                    ?>
                </select>
            </div>


            <button type="submit" class="btn btn-primary data-submit me-1 me-sm-3">تعديل</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">إغلاق</button>
        </form>
    </div>
</div>
<?php /**PATH D:\laravelProjects\Tajeri-web\resources\views/orders/edit.blade.php ENDPATH**/ ?>