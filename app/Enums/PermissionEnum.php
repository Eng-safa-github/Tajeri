<?php

namespace App\Enums;

enum PermissionEnum: string
{
    // Invoices
    case VIEW_DASHBOARD = 'عرض التقارير';
    case INVOICES = 'الفواتير';
    case INVOICES_LIST = 'قائمة الفواتير';
    case PAID_INVOICES = 'الفواتير المدفوعة';
    case PARTIALLY_PAID_INVOICES = 'الفواتير المدفوعة جزئيا';
    case UNPAID_INVOICES = 'الفواتير الغير مدفوعة';
    case ARCHIVED_INVOICES = 'ارشيف الفواتير';

    // Reports
    case REPORTS = 'التقارير';
    case INVOICES_REPORT = 'تقرير الفواتير';
    case CUSTOMERS_REPORT = 'تقرير العملاء';

    // Users
    case USERS = 'المستخدمين';
    case USERS_LIST = 'قائمة المستخدمين';
    case USERS_PERMISSIONS = 'صلاحيات المستخدمين';

    // Settings
    case SETTINGS = 'الاعدادات';
    case PRODUCTS = 'المنتجات';
    case CATEGORIES = 'الاقسام';
    case OFFERS = 'العروض';

    // Invoice Actions
    case ADD_INVOICE = 'اضافة فاتورة';
    case DELETE_INVOICE = 'حذف الفاتورة';
    case EXPORT_EXCEL = 'تصدير EXCEL';
    case CHANGE_PAYMENT_STATUS = 'تغير حالة الدفع';
    case EDIT_INVOICE = 'تعديل الفاتورة';
    case ARCHIVE_INVOICE = 'ارشفة الفاتورة';
    case PRINT_INVOICE = 'طباعة الفاتورة';
    case ADD_ATTACHMENT = 'اضافة مرفق';
    case DELETE_ATTACHMENT = 'حذف المرفق';

    // User Actions
    case ADD_USER = 'اضافة مستخدم';
    case EDIT_USER = 'تعديل مستخدم';
    case DELETE_USER = 'حذف مستخدم';

    // Permission Actions
    case VIEW_PERMISSION = 'عرض صلاحية';
    case ADD_PERMISSION = 'اضافة صلاحية';
    case EDIT_PERMISSION = 'تعديل صلاحية';
    case DELETE_PERMISSION = 'حذف صلاحية';

    // Product Actions
    case ADD_PRODUCT = 'اضافة منتج';
    case EDIT_PRODUCT = 'تعديل منتج';
    case DELETE_PRODUCT = 'حذف منتج';

    case STORE = 'المخازن';

    // Category Actions
    case ADD_CATEGORY = 'اضافة قسم';
    case EDIT_CATEGORY = 'تعديل قسم';
    case DELETE_CATEGORY = 'حذف قسم';

    // Notifications
    case NOTIFICATIONS = 'الاشعارات';

    // Order Actions
    case SHOW_ORDERS = 'عرض الطلبات';
    case EDIT_ORDER = 'تعديل الطلب';
}
