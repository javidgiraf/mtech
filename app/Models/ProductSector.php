<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSector extends Model
{
    protected $guarded = [];

    public function sector()
    {
        return $this->belongsTo(Sector::class, 'sector_id', 'id');
    }
}
