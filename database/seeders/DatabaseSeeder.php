<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\CompanyRole;
use App\Models\Category;
use App\Models\Setting;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $users = [
            [
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@camping.com',
                'mobile' => '123456789',
                'password' => bcrypt('123123'),
                'role' => 'admin',
                'remember_token' =>Str::random(10),
            ],
            [
                'id' => 2,
                'name' => 'Company',
                'email' => 'company@camping.com',
                'mobile' => '456789123',
                'password' => bcrypt('123123'),
                'role' => 'company',
                'remember_token' =>Str::random(10),
                'added_by' => 1,
            ],
            [
                'id' => 3,
                'name' => 'Operator',
                'email' => 'operator@camping.com',
                'mobile' => '789123456',
                'password' => bcrypt('123123'),
                'role' => 'operator',
                'remember_token' =>Str::random(10),
                'added_by' => 1,
            ],
            [
                'id' => 4,
                'name' => 'Entry',
                'email' => 'entry@camping.com',
                'mobile' => '123789456',
                'password' => bcrypt('123123'),
                'role' => 'entry',
                'remember_token' =>Str::random(10),
                'added_by' => 1,
            ],
        ];

        $roles = [
            [
                'id' => 1,
                'name' => 'إضافة رحلات',
                'order' => 1,
            ],
            [
                'id' => 2,
                'name' => 'إضافة حجز لشخص',
                'order' => 3,
            ],
            [
                'id' => 3,
                'name' => 'إضافة مشغل',
                'order' => 4,
            ],
            [
                'id' => 4,
                'name' => 'إضافة مسئول دخول',
                'order' => 5,
            ],
            [
                'id' => 5,
                'name' => 'إضافة أكواد خصم',
                'order' => 6,
            ],
            [
                'id' => 6,
                'name' => 'إضافة مخيمات',
                'order' => 2,
            ],
        ];

        $company_roles = [
            [
                'role_id' => 1,
                'user_id' => 2,
            ],
            [
                'role_id' => 2,
                'user_id' => 2,
            ],
            [
                'role_id' => 3,
                'user_id' => 2,
            ],
            [
                'role_id' => 4,
                'user_id' => 2,
            ],
            [
                'role_id' => 5,
                'user_id' => 2,
            ],
        ];

        $categories = [
            [
                'id' => 1,
                'name' => 'رحلة',
                'type' => 1,
            ],
            [
                'id' => 2,
                'name' => 'مخيم',
                'type' => 1,
            ],
            [
                'id' =6 3,
                'name' => 'هايك',
                'type' => 2,
            ],
            [
                'id' => 2,
                'name' => 'هايك ومخيم',
                'type' => 2,
            ],
            [
                'id' => 3,
                'name' => 'بايك',
                'type' => 2,
            ],
            [
                'id' => 4,
                'name' => 'بايك ومخيم',
                'type' => 2,
            ],
            [
                'id' => 5,
                'name' => 'عوائل',
                'type' => 3,
            ],
            [
                'id' => 8,
                'name' => 'أفراد',
                'type' => 3,
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }

        foreach ($roles as $role) {
            Role::create($role);
        }

        foreach ($company_roles as $company_role) {
            CompanyRole::create($company_role);
        }

        foreach ($categories as $cat) {
            Category::create($cat);
        }

        Setting::create([
            'id' => 1, 
            'about' => "About",
            'terms' => "Tesrms",
        ]);

    }
}
