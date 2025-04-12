<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class Menu extends Model
{
    const MENU_DASHBOARD = 'dashboard';
    const MENU_BLOGS = 'blogs';
    const MENU_CLIENTS = 'clients';
    const MENU_SECTORS = 'sectors';
    const MENU_CAREERS = 'careers';
    const MENU_SERVICES = 'services';
    const MENU_TESTIMONIALS = 'testimonials';
    const MENU_PRODUCTS = 'products';
    const MENU_PROJECTS = 'projects';
    const MENU_FAQS = 'faqs';
    const MENU_ACCESS_CONTROLS = 'access-controls';

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
