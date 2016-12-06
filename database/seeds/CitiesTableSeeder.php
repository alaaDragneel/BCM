<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    DB::statement('SET FOREIGN_KEY_CHECKS=0');
    DB::table('cities')->truncate();

    $cities = [
      [
        'name' => 'Zeitoun ',
        'governorates_id' =>  '6'
      ],
      [
        'name' => 'the red corner',
        'governorates_id' =>  '6'
      ],
      [
        'name' => 'gardens dome',
        'governorates_id' =>  '6'
      ],
      [
        'name' => 'Sharabiya',
        'governorates_id' =>  '6'
      ],
      [
        'name' => 'Warraq',
        'governorates_id' => '19',
      ],
      [
        'name' => 'Bulaq Dakrur',
        'governorates_id' => '19',
      ],
      [
        'name' => 'Dokki',
        'governorates_id' => '19',
      ],
      [
        'name' => 'Agouza ',
        'governorates_id' => '19',
      ],
      [
        'name' => 'Urban ',
        'governorates_id' => '19',
      ],
      [
        'name' => 'the pyramid',
        'governorates_id' => '19',
      ],
    ];
    DB::table('cities')->insert($cities);
  }
}
