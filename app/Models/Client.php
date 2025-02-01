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
            if ($this->attributes['logo'] ?? false) {
                Storage::disk('public')->delete('clients/'. $this->attributes['logo']);
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
}
