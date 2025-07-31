<?php

namespace database\seeders\application\datatable;

use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class GeneralSeeder extends Seeder {

  public function run(): void {
    $faker = Faker::create('id_ID');

    for($i = 1; $i <= 200; $i++){
      \DB::table('system_application_table_generals')->insert([
        'name'          => $faker->name,
        'description'   => $faker->realText,
        'created_at'    => $faker->dateTime,
        'date'          => $faker->dateTime,
      ]);
    }
  }
}
