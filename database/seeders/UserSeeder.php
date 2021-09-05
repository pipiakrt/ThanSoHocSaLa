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
        $user = User::create([
            'is_admin' => 1,
            'name' => 'Kien Van Tran',
            'email' => 'kien.tran@salagroup.vn',
            'password' => Hash::make('kien1234'),
        ]);
        $user->Attribute()->create([
            "code" => $user->id . time(),
            "type" => "admin",
            "name" => "admin",
        ]);
        return 1;
    }
}
