<?php

namespace App\Models;

use App\Models\ProductGallery;
use App\Models\TransactionItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'description', 'price', 'slug'
    ];

    public function galleries(){
        return $this->hasMany(ProductGallery::class, 'products_id', 'id');
    }

    public function carts(){
        return $this->hasOne(ProductGallery::class, 'products_id', 'id');
    }

    public function transactionitems(){
        return $this->hasMany(TransactionItem::class, 'products_id', 'id');
    }


}
