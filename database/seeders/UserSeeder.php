<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return User::create([
            'name' => 'Kien Van Tran',
            'email' => 'kien.tran@salagroup.vn',
            'password' => Hash::make('kien1234'),
        ]);
    }
}
