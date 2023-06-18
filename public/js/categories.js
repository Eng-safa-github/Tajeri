$(document).ready(function () {
    getCategories();
    addCategory();
    editCategory();
});

async function showOffcanvasToAddProduct() {
    await getCategories("#category", "#add-product-category-parent");
    showOffcanvas("#offcanvasAddProduct");
}

function showOffcanvasToEditProduct(id) {
    // Make an AJAX request to get the product data by ID
    fetch(`/api/products/${id}`)
        .then((response) => response.json())
        .then(async (product) => {
            product = product.data;
            // Get the offcanvas element by selector
            const offcanvas = document.querySelector("#offcanvasEditProduct");
            // Populate form fields with the product data
            offcanvas.querySelector("#productId").value = product.id;
            offcanvas.querySelector("#productName").value = product.name;
            // Populate the categories select element with options
            await getCategories(
                "#productCategory",
                "#edit-product-categories-parent",
                product.product_category.id
            );
            // var $categorySelect = $('#productCategory');
            // $categorySelect.val(product.product_category.id).trigger('change');

            // Show the offcanvas
            showOffcanvas("#offcanvasEditProduct");
        })
        .catch((error) => console.error(error));
}

function getCategories() {
    if ($.fn.DataTable.isDataTable("#categoryDatatable")) {
        $("#categoryDatatable").DataTable().ajax.reload();
    } else {
        $("#categoryDatatable").DataTable({
            processing: true,
            serverSide: true,
            paging: true,
            searching: true,
            lengthMenu: [7, 10, 25, 50, 75, 100],
            responsive: false,
            dom:
                '<"row"<"col-sm-12"<"col-sm-12"B>>>' +
                '<"row"<"col-sm-12 col-md-6"l>' +
                '<"col-sm-12 col-md-6"f>>' +
                '<"row"<"col-sm-12"tr>><"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
            buttons: [
                {
                    text: '<i class="bx bx-plus me-sm-2"></i><span class="d-none d-sm-inline-block">إضافة صنف</span>',
                    className: "dt-button create-new btn btn-primary m-2",
                    action: function (e, dt, node, config) {
                        showOffcanvasToAddProduct();
                    },
                },
                {
                    extend: "collection",
                    className:
                        'class="dt-button buttons-collection btn btn-label-primary dropdown-toggle me-2"',
                    text: "تصدير",
                    buttons: [
                        {
                            extend: "copy",
                            className: "dt-button buttons-print dropdown-item",
                            text: "Copy",
                            exportOptions: {
                                columns: ":visible",
                            },
                        },
                        {
                            extend: "pdf",
                            className: "dt-button buttons-print dropdown-item",
                            text: "PDF",
                            exportOptions: {
                                columns: ":visible",
                            },
                        },
                        {
                            extend: "excel",
                            className: "dt-button buttons-print dropdown-item",
                            text: "Excel",
                            exportOptions: {
                                columns: ":visible",
                            },
                        },
                        {
                            extend: "csv",
                            className: "dt-button buttons-print dropdown-item",
                            text: "CSV",
                            exportOptions: {
                                columns: ":visible",
                            },
                        },
                        {
                            extend: "print",
                            className: "dt-button buttons-print dropdown-item",
                            text: "Print",
                            exportOptions: {
                                columns: ":visible",
                            },
                        },
                    ],
                },
            ],
            ajax: "/api/categories",
            columns: [
                { data: "id" },
                { data: "name" },
                { data: "created_at" },
                {
                    render: function (data, type, row) {
                        return (
                            `<button onClick="showOffcanvasToEditProduct(${row.id})" class="btn btn-primary btn-sm">تعديل</button>` +
                            `<span>&nbsp;</span>` +
                            `<button onClick="deleteCategory('${row.id }')" class="btn btn-secondary btn-sm">حذف</button>`
                        );
                    },
                    name: "action",
                    autoWidth: true,
                    searchable: false,
                    orderable: false,
                },
            ],
        });
    }
}
function addProduct() {
    $("#addNewProductForm").validate({
        rules: {
            name: {
                required: true,
                minlength: 3,
            },
            product_category_id: {
                required: true,
                number: true,
            },
            product_image: {
                required: true,
            },
        },
        messages: {
            name: {
                required: "Please enter a product name.",
                minlength: "Product name must be at least 3 characters long.",
            },
            product_category_id: {
                required: "Please enter a product categories.",
            },
            product_image: {
                required: "Please select a product image.",
            },
        },
        submitHandler: function (form) {
            var formData = new FormData(form);
            var fileInput = $("#product_image")[0];
            var file = fileInput.files[0];
            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function () {
                var base64Image = reader.result;
                var cleanedBase64Image = base64Image.split(",")[1]; // remove metadata from base64
                formData.append("image", cleanedBase64Image);
                // make the API request using $.ajax()
                $.ajax({
                    url: "/api/products",
                    method: "POST",
                    headers: {
                        "Authorization": "Bearer " + localStorage.getItem('token')
                    },
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        // handle the successful response
                        getProducts();
                        showSuccessToast(
                            "Success",
                            "The operation completed successfully."
                        );
                    },
                    error: function (xhr, status, error) {
                        // handle the error response
                        showErrorToast("Error", error);
                        console.log(xhr.responseText);
                    },
                });
            };
        },
    });
}

function editProduct() {
    $("#editProductForm").validate({
        rules: {
            name: {
                required: false,
                minlength: 3,
            },
            product_category_id: {
                required: false,
                number: true,
            },
            product_image: {
                required: false,
            },
        },
        messages: {
            name: {
                minlength: "Product name must be at least 3 characters long.",
            },
        },
        submitHandler: function (form) {
            var formData = new FormData(form);
            var data = {};
            for (var pair of formData.entries()) {
                if (pair[1] !== "") {
                    data[pair[0]] = pair[1];
                }
            }
            var fileInput = $("#productImage")[0];
            var file = fileInput.files[0];
            console.log("file: " + file);

            if (file) {
                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function () {
                    var base64Image = reader.result;
                    var cleanedBase64Image = base64Image.split(",")[1];
                    data["image"] = cleanedBase64Image;
                    console.log(cleanedBase64Image);
                    $.ajax({
                        url: `/api/products/` + formData.get("id"),
                        method: "PUT",
                        headers: {
                            "Authorization": "Bearer " + localStorage.getItem('token')
                        },
                        contentType: "application/json",
                        data: JSON.stringify(data),
                        success: function (updatedData) {
                            getProducts();
                            showSuccessToast(
                                "Success",
                                "The operation completed successfully."
                            );
                        },
                        error: function (error) {
                            console.error("error: " + error);
                            showErrorToast("Error", error);
                        },
                    });
                };
            } else {
                $.ajax({
                    url: `/api/products/` + formData.get("id"),
                    method: "PUT",
                    headers: {
                        "Authorization": "Bearer " + localStorage.getItem('token')
                    },
                    contentType: "application/json",
                    data: JSON.stringify(data),
                    success: function (updatedData) {
                        getProducts();
                        showSuccessToast(
                            "Success",
                            "The operation completed successfully."
                        );
                    },
                    error: function (error) {
                        console.error("error: " + error);
                        showErrorToast("Error", error);
                    },
                });
            }
        },
    });
}
function stopProduct(title, id) {
    showModal("#stop-product-modal", title, id);

    // Detach the event listener before attaching it again
    $(document)
        .off("click", "#stop-product-modal #product-stop")
        .on("click", "#stop-product-modal #product-stop", function () {
            // Make the API request to stop the product
            console.log("id: " + id);
            $.ajax({
                url: "api/products/" + id + "/changeStatus",
                headers: {
                    "Authorization": "Bearer " + localStorage.getItem('token')
                },
                type: "PUT",
                success: function (data) {
                    $("#stop-product-modal").modal("hide");
                    getProducts();
                    showSuccessToast(
                        "Success",
                        "The operation completed successfully."
                    );
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $("#stop-product-modal").modal("hide");
                    getProducts();
                    showErrorToast("Error", error);
                },
            });
        });
}
