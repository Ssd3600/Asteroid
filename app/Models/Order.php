<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // Tên bảng trong cơ sở dữ liệu
    protected $table = 'tbl_order';

    // Các trường có thể được ghi nhận
    protected $primaryKey = 'order_id';
    protected $fillable = [
        'order_id', 'customer_id', 'shipping_id', 'payment_id', 'order_total', 'order_status', 'create_at', 'update_at'
        
        // Các trường khác cần thiết trong bảng
    ];

    // Các trường không được ghi nhận
    protected $guarded = [
        // những trường bị ngoại lệ
    ];
}