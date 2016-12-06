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
        'name' => 'حي الزيتون',
        'governorate_name' =>  'القاهره'
      ],
      [
        'name' => ' حي الزاوية الحمراء',
        'governorate_name' =>  'القاهره'
      ],
      [
        'name' => 'حي حدائق القبة',
        'governorate_name' =>  'القاهره'
      ],
      [
        'name' => 'حي الشرابية',
        'governorate_name' =>  'القاهره'
      ],
      [
        'name' => 'حي الساحل',
        'governorate_name' =>  'القاهره'
      ],
      [
        'name' => 'حي شبرا',
        'governorate_name' =>  'القاهره'
      ],
      [
        'name' => ' حي روض الفرج',
        'governorate_name' =>  'القاهره'
      ],
      [
        'name' => 'حي الأميرية',
        'governorate_name' =>  'القاهره'
      ],
      [
        'name' => 'حي السلام أول',
        'governorate_name' =>  'القاهره'
      ],
      [
        'name' => 'حي السلام ثان',
        'governorate_name' =>  'القاهره'
      ],
      [
        'name' => 'حي المرج',
        'governorate_name' =>  'القاهره'
      ],
      [
        'name' => 'حي المطرية',
        'governorate_name' =>  'القاهره'
      ],
      [
        'name' => ' حي عين شمس',
        'governorate_name' =>  'القاهره'
      ],
      [
        'name' => 'حي النزهة',
        'governorate_name' =>  'القاهره'
      ],
      [
        'name' => 'حي مصر الجديدة',
        'governorate_name' =>  'القاهره'
      ],
      [
        'name' => 'حي شرق مدينة نصر',
        'governorate_name' =>  'القاهره'
      ],
      [
        'name' => 'حي غرب مدينة نصر',
        'governorate_name' =>  'القاهره'
      ],
      [
        'name' => 'حي الوايلي',
        'governorate_name' =>  'القاهره'
      ],
      [
        'name' => 'حي منشأة ناصر',
        'governorate_name' =>  'القاهره'
      ],
      [
        'name' => 'حي وسط',
        'governorate_name' =>  'القاهره'
      ],
      [
        'name' => 'حي باب الشعرية',
        'governorate_name' =>  'القاهره'
      ],
      [
        'name' => 'حي الأزبكية',
        'governorate_name' =>  'القاهره'
      ],
      [
        'name' => 'حي بولاق',
        'governorate_name' =>  'القاهره'
      ],
      [
        'name' => 'حي الموسكي',
        'governorate_name' =>  'القاهره'
      ],
      [
        'name' => 'حي عابدين',
        'governorate_name' =>  'القاهره'
      ],
      [
        'name' => 'حي غرب',
        'governorate_name' =>  'القاهره'
      ],
      [
        'name' => 'حي المقطم',
        'governorate_name' =>  'القاهره'
      ],
      [
        'name' => 'حي الخليفة',
        'governorate_name' =>  'القاهره'
      ],
      [
        'name' => ' حي السيدة زينب',
        'governorate_name' =>  'القاهره'
      ],
      [
        'name' => 'حي مصر القديمة',
        'governorate_name' =>  'القاهره'
      ],
      [
        'name' => 'حي دار السلام',
        'governorate_name' =>  'القاهره'
      ],
      [
        'name' => 'حي البساتين',
        'governorate_name' =>  'القاهره'
      ],
      [
        'name' => 'حي المعادي',
        'governorate_name' =>  'القاهره'
      ],
      [
        'name' => 'حي طره',
        'governorate_name' =>  'القاهره'
      ],
      [
        'name' => 'حي المعصرة',
        'governorate_name' =>  'القاهره'
      ],
      [
        'name' => 'حي 15 مايو',
        'governorate_name' =>  'القاهره'
      ],
      [
        'name' => 'حي حلوان',
        'governorate_name' =>  'القاهره'
      ],
      [
        'name' => 'حي التبين',
        'governorate_name' =>  'القاهره'
      ],
      [
        'name' => 'حي شمال',
        'governorate_name' => 'الجيزه',
      ],
      [
        'name' => 'حي الوراق',
        'governorate_name' => 'الجيزه',
      ],
      [
        'name' => 'حي بولاق الدكرور',
        'governorate_name' => 'الجيزه',
      ],
      [
        'name' => 'حي الدقي',
        'governorate_name' => 'الجيزه',
      ],
      [
        'name' => 'حي العجوزة',
        'governorate_name' => 'الجيزه',
      ],
      [
        'name' => 'حي العمرانية',
        'governorate_name' => 'الجيزه',
      ],
      [
        'name' => 'حي الهرم',
        'governorate_name' => 'الجيزه',
      ],
      [
        'name' => 'حي جنوب',
        'governorate_name' => 'الجيزه',
      ],
    ];
    DB::table('cities')->insert($cities);
  }
}
