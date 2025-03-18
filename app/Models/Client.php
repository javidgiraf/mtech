<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Client extends Model
{
    protected $guarded = [];

    public function setLogoAttribute($file)
    {
        if ($file) {
            if (!empty($this->attributes['logo']) && Storage::disk('public')->exists('clients/' . $this->attributes['logo'])) {
                Storage::disk('public')->delete('clients/' . $this->attributes['logo']);
            }
            $logoName = time() . '_' . $file->getClientOriginalName();
            $path = 'clients';
            $file->storeAs($path, $logoName, 'public');

            $this->attributes['logo'] = $logoName;
        }
    }

    public function getLogoUrl()
    {
        return asset('storage/clients/'. $this->attributes['logo']);
    }

    public function sector()
    {
        return $this->belongsTo(Sector::class, 'sector_id', 'id');
    }
}
