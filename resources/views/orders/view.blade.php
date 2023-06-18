@extends('layouts.contentLayoutMaster')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="breadcrumb-wrapper py-3 mb-4"><span class="text-muted fw-light">الطلبات /</span> إدارة الطلبات
            </h4>
            <!-- DataTable with Buttons -->
            <div class="card">
                <div class="card-datatable table-responsive pt-0">
                    <table id="orderDatatable" class="datatables-basic table table-bordered">
                        <thead>
                        <tr>
                            <th>الرقم</th>
                            <th>اسم المستخدم</th>
                            <th>المبلغ</th>
                            <th>الحالة</th>
                            <th>الية التوصيل</th>
                            <th>العنوان</th>
                            <th>الإجراءات</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>

            <!-- BEGIN: Modal-->
            @include('orders.edit')
            @include('orders.show')
            @include('orders.map')
            <!-- END: Modal-->

            <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
        @push('scripts')
            <script src="{{asset('js/order.js')}}"></script>
    @endpush
@endsection
