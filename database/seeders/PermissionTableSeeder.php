<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('permissions')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $permissions = [
            [
                'name' => 'View Dashboard',
                'menu_id' => Menu::getId(Menu::MENU_DASHBOARD),
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Projects List',
                'menu_id' => Menu::getId(Menu::MENU_PROJECTS),
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Create Project',
                'menu_id' => Menu::getId(Menu::MENU_PROJECTS),
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Edit Project',
                'menu_id' => Menu::getId(Menu::MENU_PROJECTS),
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Delete Project',
                'menu_id' => Menu::getId(Menu::MENU_PROJECTS),
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Products List',
                'menu_id' => Menu::getId(Menu::MENU_PRODUCTS),
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Create Product',
                'menu_id' => Menu::getId(Menu::MENU_PRODUCTS),
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Edit Product',
                'menu_id' => Menu::getId(Menu::MENU_PRODUCTS),
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Delete Product',
                'menu_id' => Menu::getId(Menu::MENU_PRODUCTS),
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now()
            ],
            
            [
                'name' => 'Services List',
                'menu_id' => Menu::getId(Menu::MENU_SERVICES),
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Create Service',
                'menu_id' => Menu::getId(Menu::MENU_SERVICES),
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Edit Service',
                'menu_id' => Menu::getId(Menu::MENU_SERVICES),
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Delete Service',
                'menu_id' => Menu::getId(Menu::MENU_SERVICES),
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Sectors List',
                'menu_id' => Menu::getId(Menu::MENU_SECTORS),
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Create Sector',
                'menu_id' => Menu::getId(Menu::MENU_SECTORS),
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Edit Sector',
                'menu_id' => Menu::getId(Menu::MENU_SECTORS),
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Delete Sector',
                'menu_id' => Menu::getId(Menu::MENU_SECTORS),
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Careers List',
                'menu_id' => Menu::getId(Menu::MENU_CAREERS),
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Create Career',
                'menu_id' => Menu::getId(Menu::MENU_CAREERS),
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Edit Career',
                'menu_id' => Menu::getId(Menu::MENU_CAREERS),
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Delete Career',
                'menu_id' => Menu::getId(Menu::MENU_CAREERS),
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Clients List',
                'menu_id' => Menu::getId(Menu::MENU_CLIENTS),
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Create Client',
                'menu_id' => Menu::getId(Menu::MENU_CLIENTS),
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Edit Client',
                'menu_id' => Menu::getId(Menu::MENU_CLIENTS),
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Delete Client',
                'menu_id' => Menu::getId(Menu::MENU_CLIENTS),
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Blogs List',
                'menu_id' => Menu::getId(Menu::MENU_BLOGS),
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Create Blog',
                'menu_id' => Menu::getId(Menu::MENU_BLOGS),
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Edit Blog',
                'menu_id' => Menu::getId(Menu::MENU_BLOGS),
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Delete Blog',
                'menu_id' => Menu::getId(Menu::MENU_BLOGS),
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now()
            ],


            [
                'name' => 'Testimonials List',
                'menu_id' => Menu::getId(Menu::MENU_TESTIMONIALS),
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Create Testimonial',
                'menu_id' => Menu::getId(Menu::MENU_TESTIMONIALS),
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Edit Testimonial',
                'menu_id' => Menu::getId(Menu::MENU_TESTIMONIALS),
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Delete Testimonial',
                'menu_id' => Menu::getId(Menu::MENU_TESTIMONIALS),
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        DB::table('permissions')->insert($permissions);
    }
}
