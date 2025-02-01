<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class Menu extends Model
{
    const MENU_DASHBOARD = 'Dashboard';
    const MENU_BLOGS = 'Blogs';
    const MENU_CLIENTS = 'Clients';
    const MENU_SECTORS = 'Sectors';
    const MENU_SERVICES = 'Services';
    const MENU_TESTIMONIALS = 'Testimonials';
    const MENU_PRODUCTS = 'Products';
    const MENU_PROJECTS = 'Projects';

    protected static function getId($name)
    {
        return self::query()->whereName($name)
            ->first()->id;
    }

    public function permissions()
    {
        return $this->hasMany(Permission::class, 'menu_id', 'id');
    }
    
}
