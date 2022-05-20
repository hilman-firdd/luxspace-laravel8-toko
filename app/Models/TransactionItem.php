<?php

namespace App\Models;

use App\Models\Product;
use App\Models\TransactionItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransactionItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id', 'products_id', 'transactions_id'
    ];

    public function product(){
        return $this->hasOne(Product::class, 'id', 'products_id');
    }
}
