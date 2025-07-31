<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder {

  public function run(): void {

    $user = [
      [
        'name'              => 'Administrator',
        'email'             => 'admin@exilednoname.com',
        'phone'             => '08112448111',
        'username'          => 'administrator',
        'password'          => bcrypt('1234'),
        'created_at'        => Carbon::now(),
        'email_verified_at' => Carbon::now(),
      ],
      [
        'name'              => 'Admin',
        'email'             => 'admin@exilednoname.site',
        'phone'             => '08112448112',
        'username'          => 'admin',
        'password'          => bcrypt('1234'),
        'created_at'        => Carbon::now(),
        'email_verified_at' => Carbon::now(),
      ],
    ];
    User::insert($user);

    $model_has_roles = [
      [
        'role_id'        => '1',
        'model_type'     => 'App\Models\User',
        'model_id'       => '1',
      ],
    ];
    \DB::table('model_has_roles')->insert($model_has_roles);

  }
}
