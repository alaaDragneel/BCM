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
        'name'     => 'الأقصر',
        'country_name' => 'مصر',
      ],
      [
        'name'     => 'الإسكندرية',
        'country_name' => 'مصر',
      ],
      [
        'name'     => 'الشرقية',
        'country_name' => 'مصر',
      ],
      [
        'name'     => 'أسيوط',
        'country_name' => 'مصر',
      ],
      [
        'name'     => 'البحيرة',
        'country_name' => 'مصر',
      ],
      [
        'name'     => 'القاهرة',
        'country_name' => 'مصر',
      ],
      [
        'name'     => 'دمياط',
        'country_name' => 'مصر',
      ],
      [
        'name'     => 'كفر الشيخ',
        'country_name' => 'مصر',
      ],
      [
        'name'     => 'المنوفية',
        'country_name' => 'مصر',
      ],
      [
        'name'     => 'المنيا',
        'country_name' => 'مصر',
      ],
      [
        'name'     => 'بورسعيد',
        'country_name' => 'مصر',
      ],
      [
        'name'     => 'القليوبية',
        'country_name' => 'مصر',
      ],
      [
        'name'     => 'أسوان',
        'country_name' => 'مصر',
      ],
      [
        'name'     => 'الإسماعيلية',
        'country_name' => 'مصر',
      ],
      [
        'name'     => 'بني سويف',
        'country_name' => 'مصر',
      ],
      [
        'name'     => 'الدقهلية',
        'country_name' => 'مصر',
      ],
      [
        'name'     => 'الفيوم',
        'country_name' => 'مصر',
      ],
      [
        'name'     => 'الغربية',
        'country_name' => 'مصر',
      ],
      [
        'name'     => 'الجيزة',
        'country_name' => 'مصر',
      ],
      [
        'name'     => 'البحر الأحمر',
        'country_name' => 'مصر',
      ],
      [
        'name'     => 'قنا',
        'country_name' => 'مصر',
      ],
      [
        'name'     => 'جنوب سيناء',
        'country_name' => 'مصر',
      ],
      [
        'name'     => 'شمال سيناء',
        'country_name' => 'مصر',
      ],
      [
        'name'     => 'السويس',
        'country_name' => 'مصر',
      ],
      [
        'name'     => 'سوهاج',
        'country_name' => 'مصر',
      ],
      [
        'name'     => 'الوادي الجديد',
        'country_name' => 'مصر',
      ],
      [
        'name'     => 'مطروح',
        'country_name' => 'مصر',
      ],
    ];
    DB::table('governorates')->insert($governorates);
  }
}
