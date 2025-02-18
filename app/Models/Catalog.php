<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Catalog extends Model
{
    protected $guarded = [];

    public function setPdfFileAttribute($file)
    {
        if ($file) {
            if (!empty($this->attributes['pdf_file']) && Storage::disk('public')->exists('catalogs/' . $this->attributes['pdf_file'])) {
                Storage::disk('public')->delete('catalogs/' . $this->attributes['pdf_file']);
            }
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = 'catalogs';
            $file->storeAs($path, $fileName, 'public');

            $this->attributes['pdf_file'] = $fileName;
        }
    }

    public function getCatalogPdfUrl()
    {
        return asset('storage/catalogs/'. $this->attributes['pdf_file']);
    }    
}
