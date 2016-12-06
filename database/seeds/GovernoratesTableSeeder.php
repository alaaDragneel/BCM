<?php

use Illuminate\Database\Seeder;

class GovernoratesTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    DB::statement('SET FOREIGN_KEY_CHECKS=0');
    DB::table('governorates')->truncate();
    $governorates = [
      [
        'name'     => 'Luxor',
        'country_id' => '1',
      ],
      [
        'name'     => 'Alexandria',
        'country_id' => '1',
      ],
      [
        'name'     => 'Eastern',
        'country_id' => '1',
      ],
      [
        'name'     => 'Asyut',
        'country_id' => '1',
      ],
      [
        'name'     => 'the lake',
        'country_id' => '1',
      ],
      [
        'name'     => 'Cairo',
        'country_id' => '1',
      ],
      [
        'name'     => 'Damietta',
        'country_id' => '1',
      ],
      [
        'name'     => 'Kafr el Sheikh',
        'country_id' => '1',
      ],
      [
        'name'     => 'Monoufia',
        'country_id' => '1',
      ],
      [
        'name'     => 'Minya',
        'country_id' => '1',
      ],
      [
        'name'     => 'Port Said',
        'country_id' => '1',
      ],
      [
        'name'     => 'Qaliubiya',
        'country_id' => '1',
      ],
      [
        'name'     => 'Aswan',
        'country_id' => '1',
      ],
      [
        'name'     => 'Ismailia',
        'country_id' => '1',
      ],
      [
        'name'     => 'Bani Sweif',
        'country_id' => '1',
      ],
      [
        'name'     => 'Dakahlia',
        'country_id' => '1',
      ],
      [
        'name'     => 'Fayoum',
        'country_id' => '1',
      ],
      [
        'name'     => 'Western',
        'country_id' => '1',
      ],
      [
        'name'     => 'Giza',
        'country_id' => '1',
      ],

    ];
    DB::table('governorates')->insert($governorates);
  }
}
