<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetFine extends Model
{
    protected $fillable =[
        'asset_return_id',
        'amount',
        'type',
        'notes',
    ];

    public function assetRetrun()
    {
        return $this->belongsTo(AssetReturn::class);
    }
}
