<?php

namespace App\Models;
use App\Models\Category;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'code',
        'total_qty',
        'good_qty',
        'damage_qty',
        'lost_qty',
        'borrowed_qty',
        'is_available',
        'image',
        'description',
        'purchase_price',
        'procurement_year',
        'funding_source',
    ];

    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function AssetReturns()
    {
        return $this->hasMany(AssetReturn::class);
    }

}