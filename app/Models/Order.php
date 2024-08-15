<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'shipping_phoneNumber',
        'shipping_city',
        'shipping_postalCode',
        'product_name',
        'quantity'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function user_info(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function product_info(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
