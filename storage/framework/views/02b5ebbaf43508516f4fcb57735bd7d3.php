<style>
    .modal-body {
        max-height: 300px; /* Adjust the height as needed */
        overflow-y: auto;
    }

    .table {
        width: 100%; /* Adjust the width as needed */
    }
</style>

<div class="modal fade" id="show-order-products-modal" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>الرقم</th>
                            <th>الكمية</th>
                            <th>اسم المنتج</th>
                            <th>الوحدة</th>
                            <th>سعر الوحدة</th>
                            <th>الاجمالي</th>
                        </tr>
                        </thead>
                        <tbody id="order-products-table-body">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <p id="product-count"></p>
                <p id="total-amount"></p>
            </div>
        </div>
    </div>
</div>
<?php /**PATH E:\tajeri\resources\views/orders/show.blade.php ENDPATH**/ ?>