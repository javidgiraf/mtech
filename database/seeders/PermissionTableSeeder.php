<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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

        $superAdmin = Role::where('name', 'Super Admin')->first();

        $permissions = [
            [
                'name' => 'View Dashboard',
                'menu_id' => Menu::getId(Menu::MENU_DASHBOARD),
                'guard_name' => 'web',
            ],
            [
                'name' => 'Projects List',
                'menu_id' => Menu::getId(Menu::MENU_PROJECTS),
                'guard_name' => 'web',
            ],
            [
                'name' => 'Create Project',
                'menu_id' => Menu::getId(Menu::MENU_PROJECTS),
                'guard_name' => 'web',
            ],
            [
                'name' => 'Edit Project',
                'menu_id' => Menu::getId(Menu::MENU_PROJECTS),
                'guard_name' => 'web',
            ],
            [
                'name' => 'Delete Project',
                'menu_id' => Menu::getId(Menu::MENU_PROJECTS),
                'guard_name' => 'web',
            ],
            [
                'name' => 'Products List',
                'menu_id' => Menu::getId(Menu::MENU_PRODUCTS),
                'guard_name' => 'web',
            ],
            [
                'name' => 'Create Product',
                'menu_id' => Menu::getId(Menu::MENU_PRODUCTS),
                'guard_name' => 'web',
            ],
            [
                'name' => 'Edit Product',
                'menu_id' => Menu::getId(Menu::MENU_PRODUCTS),
                'guard_name' => 'web',
            ],
            [
                'name' => 'Delete Product',
                'menu_id' => Menu::getId(Menu::MENU_PRODUCTS),
                'guard_name' => 'web',
            ],
            
            [
                'name' => 'Services List',
                'menu_id' => Menu::getId(Menu::MENU_SERVICES),
                'guard_name' => 'web',
            ],
            [
                'name' => 'Create Service',
                'menu_id' => Menu::getId(Menu::MENU_SERVICES),
                'guard_name' => 'web',
            ],
            [
                'name' => 'Edit Service',
                'menu_id' => Menu::getId(Menu::MENU_SERVICES),
                'guard_name' => 'web',
            ],
            [
                'name' => 'Delete Service',
                'menu_id' => Menu::getId(Menu::MENU_SERVICES),
                'guard_name' => 'web',
            ],

            [
                'name' => 'Sectors List',
                'menu_id' => Menu::getId(Menu::MENU_SECTORS),
                'guard_name' => 'web',
            ],
            [
                'name' => 'Create Sector',
                'menu_id' => Menu::getId(Menu::MENU_SECTORS),
                'guard_name' => 'web',
            ],
            [
                'name' => 'Edit Sector',
                'menu_id' => Menu::getId(Menu::MENU_SECTORS),
                'guard_name' => 'web',
            ],
            [
                'name' => 'Delete Sector',
                'menu_id' => Menu::getId(Menu::MENU_SECTORS),
                'guard_name' => 'web',
            ],

            [
                'name' => 'Careers List',
                'menu_id' => Menu::getId(Menu::MENU_CAREERS),
                'guard_name' => 'web',
            ],
            [
                'name' => 'Create Career',
                'menu_id' => Menu::getId(Menu::MENU_CAREERS),
                'guard_name' => 'web',
            ],
            [
                'name' => 'Edit Career',
                'menu_id' => Menu::getId(Menu::MENU_CAREERS),
                'guard_name' => 'web',
            ],
            [
                'name' => 'Delete Career',
                'menu_id' => Menu::getId(Menu::MENU_CAREERS),
                'guard_name' => 'web',
            ],

            [
                'name' => 'Clients List',
                'menu_id' => Menu::getId(Menu::MENU_CLIENTS),
                'guard_name' => 'web',
            ],
            [
                'name' => 'Create Client',
                'menu_id' => Menu::getId(Menu::MENU_CLIENTS),
                'guard_name' => 'web',
            ],
            [
                'name' => 'Edit Client',
                'menu_id' => Menu::getId(Menu::MENU_CLIENTS),
                'guard_name' => 'web',
            ],
            [
                'name' => 'Delete Client',
                'menu_id' => Menu::getId(Menu::MENU_CLIENTS),
                'guard_name' => 'web',
            ],

            [
                'name' => 'Blogs List',
                'menu_id' => Menu::getId(Menu::MENU_BLOGS),
                'guard_name' => 'web',
            ],
            [
                'name' => 'Create Blog',
                'menu_id' => Menu::getId(Menu::MENU_BLOGS),
                'guard_name' => 'web',
            ],
            [
                'name' => 'Edit Blog',
                'menu_id' => Menu::getId(Menu::MENU_BLOGS),
                'guard_name' => 'web',
            ],
            [
                'name' => 'Delete Blog',
                'menu_id' => Menu::getId(Menu::MENU_BLOGS),
                'guard_name' => 'web',
            ],


            [
                'name' => 'Testimonials List',
                'menu_id' => Menu::getId(Menu::MENU_TESTIMONIALS),
                'guard_name' => 'web',
            ],
            [
                'name' => 'Create Testimonial',
                'menu_id' => Menu::getId(Menu::MENU_TESTIMONIALS),
                'guard_name' => 'web',
            ],
            [
                'name' => 'Edit Testimonial',
                'menu_id' => Menu::getId(Menu::MENU_TESTIMONIALS),
                'guard_name' => 'web',
            ],
            [
                'name' => 'Delete Testimonial',
                'menu_id' => Menu::getId(Menu::MENU_TESTIMONIALS),
                'guard_name' => 'web',
            ],

            [
                'name' => 'Faqs List',
                'menu_id' => Menu::getId(Menu::MENU_FAQS),
                'guard_name' => 'web',
            ],
            [
                'name' => 'Create Faq',
                'menu_id' => Menu::getId(Menu::MENU_FAQS),
                'guard_name' => 'web',
            ],
            [
                'name' => 'Edit Faq',
                'menu_id' => Menu::getId(Menu::MENU_FAQS),
                'guard_name' => 'web',
            ],
            [
                'name' => 'Delete Faq',
                'menu_id' => Menu::getId(Menu::MENU_FAQS),
                'guard_name' => 'web',
            ],
        ];


        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission['name'],
                'menu_id' => $permission['menu_id'],
                'guard_name' => $permission['guard_name']
            ]);
        }

        if ($superAdmin) {
            $superAdmin->givePermissionTo(Permission::all());
        }
    }
}
