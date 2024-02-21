<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin_role = Role::create([
            'role' => Role::ROLE_ADMIN,
            'permissions' => json_encode([
                'all'
            ]),
        ]);

        $manager_role = Role::create([
            'role' => Role::ROLE_MANAGER,
            'permissions' => json_encode([
                'products',
                'create_product',
                'update_product',
                'delete_product',
                'show_product',
                'orders',
                'create_order',
                'update_order',
                'view_order',
                'delete_order',
            ]),
        ]);

        $user_role = Role::create([
            'role' => Role::ROLE_USER,
            'permissions' => null,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@mail.ru',
            'password' => Hash::make('1234'),
            'role_id' => $admin_role->id,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'system',
            'email' => 'system',
            'password' => Hash::make('Halfalskje981yu2o4nAKSDN9w8e12iurjfklDJ(@98e8yqudsahkj'),
            'role_id' => $admin_role->id,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'manager',
            'email' => 'manager@mail.ru',
            'password' => Hash::make('1234'),
            'role_id' => $manager_role->id,
        ]);
        \App\Models\User::factory()->create([
            'name' => 'user',
            'email' => 'user@mail.ru',
            'password' => Hash::make('1234'),
            'role_id' => $user_role->id,
        ]);
    }
}
