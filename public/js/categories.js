$(document).ready(function () {
    getCategories();
    addCategory();
    editCategory();
});

async function showOffcanvasToAddCategory() {
    showOffcanvas("#offcanvasAddCategory");
}

function showOffcanvasToEditCategory(id) {
    // Make an AJAX request to get the product data by ID
    fetch(`/api/categories/${id}`)
        .then((response) => response.json())
        .then(async (category) => {
            category = category.data;
            // Get the offcanvas element by selector
            const offcanvas = document.querySelector("#offcanvasEditCategory");
            // Populate form fields with the product data
            offcanvas.querySelector("#categoryId-edit").value = category.id;
            offcanvas.querySelector("#categoryName-edit").value = category.name;
            // Populate the categories select element with options

            // var $categorySelect = $('#productCategory');
            // $categorySelect.val(product.product_category.id).trigger('change');

            // Show the offcanvas
            showOffcanvas("#offcanvasEditCategory");
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
                        showOffcanvasToAddCategory();
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
                            `<button onClick="showOffcanvasToEditCategory(${row.id})" class="btn btn-primary btn-sm">تعديل</button>` +
                            `<span>&nbsp;</span>` +
                            `<button onClick="deleteCategory('حذف','${row.id }')" class="btn btn-secondary btn-sm">حذف</button>`
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
function addCategory() {
    $("#addNewCategoryForm").validate({
        rules: {
            name: {
                required: true,
                minlength: 3,
            },
        },
        messages: {
            name: {
                required: "Please enter a product name.",
                minlength: "Product name must be at least 3 characters long.",
            }
        },
        submitHandler: function (form) {
            var formData = new FormData(form);
            $.ajax({
                url: "/api/categories",
                method: "POST",
                headers: {
                    "Authorization": "Bearer " + localStorage.getItem('token')
                },
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    // handle the successful response
                    getCategories();
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
        },
    });
}

function editCategory() {
    $("#editCategoryForm").validate({
        rules: {
            name: {
                required: true,
                minlength: 3,
            },
        },
        submitHandler: function (form) {
            var formData = new FormData(form);
            formData.append("id", $("#categoryId-edit").val());
            formData.append("name", $("#categoryName-edit").val());
            console.log(formData);
            $.ajax({
                url: `/api/categories/` + formData.get("id"),
                method: "PUT",
                headers: {
                    "Authorization": "Bearer " + localStorage.getItem('token')
                },
                contentType: "application/json",
                data: JSON.stringify(Object.fromEntries(formData.entries())),
                success: function (updatedData) {
                    getCategories();
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
        },
    });
}
function deleteCategory(title,id) {
    showModal("#delete-category-modal", title, id);

    // Detach the event listener before attaching it again
    $(document)
        .off("click", "#delete-category-modal #delete-category")
        .on("click", "#delete-category-modal #delete-category", function () {
            // Make the API request to stop the product
            $.ajax({
                url: "api/categories/" + id,
                headers: {
                    "Authorization": "Bearer " + localStorage.getItem('token')
                },
                type: "DELETE",
                success: function (data) {
                    $("#delete-category-modal").modal("hide");
                    getCategories();
                    showSuccessToast(
                        "Success",
                        "The operation completed successfully."
                    );
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $("#delete-category-modal").modal("hide");
                    getCategories();
                    showErrorToast("Error", error);
                },
            });
        });
}
