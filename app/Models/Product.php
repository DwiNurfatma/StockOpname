<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    protected $fillable = ['category_id', 'harga_beli', 'harga_jual',  'nama', 'stok',  'gambar'];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    // public function stock()
    // {
    //     return $this->hasMany('App\Models\Stock', 'product_id');
    // }
}
