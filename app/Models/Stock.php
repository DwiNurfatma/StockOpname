<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = "stocks";
    protected $fillable = ['id', 'user_id', 'product_id',  'category_id', 'stok',  'terjual'];

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
}
