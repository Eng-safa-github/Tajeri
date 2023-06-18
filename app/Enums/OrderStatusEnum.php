<?php

namespace App\Enums;

enum OrderStatusEnum: string
{
    case UnderReview = 'under-review';
    case  Processing = 'processing';
    case Canceled = 'canceled';
    case Delivered = 'delivered';
}


