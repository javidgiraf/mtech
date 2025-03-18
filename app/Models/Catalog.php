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
