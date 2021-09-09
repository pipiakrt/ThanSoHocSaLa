<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Admin::create([
            'name' => 'Kien Van Tran',
            'email' => 'kien.tran@salagroup.vn',
            'password' => Hash::make('kien1234'),
        ]);
        $user->Permission()->create(["name" => "administrator"]);
        return 1;
    }
}
