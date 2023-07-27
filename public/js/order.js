$(document).ready(function () {
    getOrders();
    editOrder();
    editOrder();
});

function editOrder() {
    $("#editOrderForm").validate({
        rules: {
            status: {
                required: true,
            }
        },
        submitHandler: function (form) {
            var formData = new FormData(form);
            formData.append("delivery_type", $("#delivery_type_edit").val());
            formData.append("status", $("#status_edit").val());
            console.log(formData.get('status'));
            $.ajax({
                url: "/api/dashboard-orders/" + formData.get("id"),
                method: "PUT",
                contentType: "application/json",
                headers: {
                    "Authorization": "Bearer " + localStorage.getItem('token')
                },

                data: JSON.stringify(Object.fromEntries(formData.entries())),
                processData: false,
                success: function (updatedData) {
                    getOrders();
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
function getOrders() {
    if ($.fn.DataTable.isDataTable("#orderDatatable")) {
        $("#orderDatatable").DataTable().ajax.reload();
    } else {
      
        $("#orderDatatable").DataTable({
            processing: true,
            serverSide: true,
            paging: true,
            searching: true,
            lengthMenu: [7, 10, 25, 50, 75, 100],
            responsive: false,
            dom: '<"row"<"col-sm-12"<"col-sm-12"B>>>' +
                '<"row"<"col-sm-12 col-md-6"l>' +
                '<"col-sm-12 col-md-6"f>>' +
                '<"row"<"col-sm-12"tr>><"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
            buttons: [
                // {
                //     text: '<i class="bx bx-plus me-sm-2"></i><span class="d-none d-sm-inline-block">إضافة طلب</span>',
                //     className: "dt-button create-new btn btn-primary m-2",
                //     action: function (e, dt, node, config) {
                //         showOffcanvasToAddProduct();
                //     },
                //     enabled: false, // Add this line to disable the button
                // },
                {
                    extend: "collection",
                    text: '<i class="bx bx-plus me-sm-2"></i><span class="d-none d-sm-inline-block">تصدير</span>',     
                    className: 'class="dt-button buttons-collection btn btn-label-primary dropdown-toggle me-2"',
                     
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
            "ajax": {
                "url": '/api/dashboard-orders',
           
                "type": "GET",
                "datatype": "json"
            },
            columns: [
                { data: "id" },
                { data: "user.username" },
                { data: "amount" },
                { data: "status" },
                { data: "delivery_type" },
                { data: "user_address.address" },

                {
                    render: function (data, type, row) {
                        return (
                            `<button onClick="showOffcanvasToEditOrder(${row.id})" class="btn btn-primary btn-sm">تعديل </button>` +
                            `<br>` +
                            `<br>` +
                            `<button onClick="showMap('${row.id}')" class="btn btn-secondary btn-sm">الموقع</button>`+
                            `<br>` +
                            `<br>` +
                            `<button onClick="showProduct('${row.id}')" class="btn btn-secondary btn-sm">استعراض</button>`
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
function showOffcanvasToEditOrder(orderId) {
    // Retrieve the token from your desired source (e.g., localStorage)
    const token = localStorage.getItem('token');
    const offcanvas = document.querySelector("#offcanvasEditOrder");
    offcanvas.querySelector("#orderId").value = orderId;
    console.log(orderId)

    // Set the request headers with the token
    const headers = new Headers();
    headers.append('Authorization', `Bearer ${token}`);
    headers.append('Content-Type', 'application/json');

    // Configure the API request
    const requestOptions = {
        method: 'GET',
        headers: headers
    };

    // Call the API to fetch order data
    fetch(`api/dashboard-orders/${orderId}`, requestOptions)
        .then(response => response.json())
        .then(data => {
            console.log("data.status: "+JSON.stringify(data.data.status))
            const deliveryTypeSelect = document.getElementById("delivery_type_edit");
            deliveryTypeSelect.value = data.data.delivery_type;

            const statusSelect = document.getElementById("status_edit");
            statusSelect.value = data.data.status;

            showOffcanvas("#offcanvasEditOrder");
        })
        .catch((error) => console.error(error));
}

function showProduct(orderId) {
    // Retrieve the token from your desired source (e.g., localStorage)
    const token = localStorage.getItem('token');

    // Set the request headers with the token
    const headers = new Headers();
    headers.append('Authorization', `Bearer ${token}`);
    headers.append('Content-Type', 'application/json');

    // Configure the API request
    const requestOptions = {
        method: 'GET',
        headers: headers
    };

    // Call the API to fetch order data
    fetch(`api/dashboard-orders/${orderId}`, requestOptions)
        .then(response => response.json())
        .then(data => {
            if (data) {
                const parsedData = JSON.stringify(data);
                showOrderProductsModal(parsedData);
            } else {
                console.error('Invalid orderStore data:', data);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
}
function showMap(orderId) {
    // Retrieve the token from your desired source (e.g., localStorage)
    const token = localStorage.getItem('token');

    // Set the request headers with the token
    const headers = new Headers();
    headers.append('Authorization', `Bearer ${token}`);
    headers.append('Content-Type', 'application/json');

    // Configure the API request
    const requestOptions = {
        method: 'GET',
        headers: headers
    };

    // Call the API to fetch order data
    fetch(`api/dashboard-orders/${orderId}`, requestOptions)
        .then(response => response.json())
        .then(data => {
            if (data) {
                const parsedData = JSON.stringify(data);
                showMapModal(parsedData);
            } else {
                console.error('Invalid orderStore data:', data);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

function showOrderProductsModal(orderStoreData) {
    // Get a reference to the modal
    var jsonObject = JSON.parse(orderStoreData);
    console.log(jsonObject.data);
    const modal = document.getElementById('show-order-products-modal');

    // Update the modal's title
    const modalTitle = modal.querySelector('.modal-title');
    modalTitle.textContent = 'Order Products';

    // Update the modal's body
    const modalBody = modal.querySelector('.modal-body');
    modalBody.innerHTML = '';

    // Create the table element
    const table = document.createElement('table');
    table.classList.add('table');
    modalBody.appendChild(table);

    // Create the table header row
    const thead = document.createElement('thead');
    const headerRow = document.createElement('tr');
    thead.appendChild(headerRow);
    table.appendChild(thead);

    // Add table headers
    const headers = ['الرقم', 'الكمية', 'اسم المنتج', 'الوحدة','سعر الوحدة','الاجمالي'];
    headers.forEach(headerText => {
        const th = document.createElement('th');
        th.textContent = headerText;
        headerRow.appendChild(th);
    });

    // Create the table body
    const tbody = document.createElement('tbody');
    table.appendChild(tbody);
    let totalAmount = 0;

    // Check if orderStoreData is a valid array
    if (Array.isArray(jsonObject.data.orderStore)) {
        // Loop through the orderStoreData and create table rows with data
        jsonObject.data.orderStore.forEach(order => {
            const product = order.order_product;
            const quantity = order.quantity;

            const row = document.createElement('tr');
            tbody.appendChild(row);

            // Add table cells with data
            const cells = [order.id, quantity,  product.name,order.unit,order.unit_price,quantity*order.unit_price];
            cells.forEach((cellData, index) => {
                const td = document.createElement('td');
                td.textContent = cellData;
                row.appendChild(td);
                // Calculate the total amount
                if (index === 5) {
                    totalAmount += cellData;
                }

            });
        });
    } else {
        console.error('Invalid orderStoreData:', orderStoreData);
    }
    // Update the modal's footer
    const modalFooter = modal.querySelector('.modal-footer');
    modalFooter.innerHTML = '';

    // Add count of products
    const productCount = jsonObject.data.orderStore.length;
    const countText = `Count of Products: ${productCount}`;
    const countElement = document.createElement('p');
    countElement.textContent = countText;
    modalFooter.appendChild(countElement);

    // Add total amount
    const totalText = `Total Amount: ${Math.floor(totalAmount)}`;
    const totalElement = document.createElement('p');
    totalElement.textContent = totalText;
    modalFooter.appendChild(totalElement);

    // Show the modal
    const modalToggle = new bootstrap.Modal(modal);
    modalToggle.show();
}

function showMapModal(orderStoreData) {
    // Get a reference to the modal
    var jsonObject = JSON.parse(orderStoreData);
    console.log(jsonObject.data);
    const modal = document.getElementById('show-order-map-modal');

    // Update the modal's title
    const modalTitle = modal.querySelector('.modal-title');
    modalTitle.textContent = 'Order Map';
    var userAddress = jsonObject.data.userAddress;
    var latitude = userAddress.latitude;
    var longitude = userAddress.longitude;

    var imageUrl = 'https://maps.googleapis.com/maps/api/staticmap?center=' + latitude + ',' + longitude + '&zoom=12&markers=' + latitude + ',' + longitude + '&size=1000x700&key=AIzaSyAGOcexth0tRT_AjLcVM--2AJn2GubdHZU';
console.log("url:"+imageUrl);
    // Update the modal's body
    const modalBody = modal.querySelector('.modal-body');
    modalBody.innerHTML = '<img src="' + imageUrl + '" style="border-radius: 20px; width: 100%; height: 100%;" alt="">';

    // Show the modal
    const modalToggle = new bootstrap.Modal(modal);
    modalToggle.show();
}


