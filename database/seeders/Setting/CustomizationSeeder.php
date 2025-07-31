<?php

namespace Database\Seeders\Setting;

use Carbon\Carbon as Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Backend\__System\Administrative\Application\Customization;

class CustomizationSeeder extends Seeder {

  public function run() {
    $data = [
      [
        'sticky_toolbar'              => '0',
        'topbar_search'               => '0',
        'topbar_notifications'        => '0',
        'topbar_quick_actions'        => '0',
        'topbar_cart'                 => '0',
        'topbar_chat'                 => '0',
        'created_at'                  => Carbon::now(),
      ],
    ];

    Customization::insert($data);
  }

}
