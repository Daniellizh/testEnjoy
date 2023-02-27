<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['email', 
    'product_id', 
    'price', 
    'amount', 
    'postName', 
    'postOffice', 
    'postCity', 
    'postStreet', 
    'postBuilder'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
