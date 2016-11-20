<?php

use Illuminate\Database\Seeder;

class teamWorkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::statement('SET FOREIGN_KEY_CHECKS=0');
      DB::table('teamWorks')->truncate();

       $teamWork = [
         [
           'id'           => 1,
           'name'     => 'alaa_dragneel',
           'email'    => 'alaa_dragneel@yahoo.com',
           'phoneNo'     => '01093901954',
           'image'     => 'src/backend/dist/img/avatar5.png',
           'job'     => 'i\'am a web development',
           'user_id'     => 3,
           'password'     => bcrypt('666666'),
         ],
         [
           'id'           => 2,
           'name'     => 'mohamed alaa',
           'email'    => 'moaalaa@yahoo.com',
           'phoneNo'     => '01196901594',
           'image'     => 'src/backend/dist/img/avatar5.png',
           'job'     => 'i\'am a web desgin',
           'user_id'     => 3,
           'password'     => bcrypt('666666'),
         ],
         [
           'id'           => 3,
           'name'     => 'ali',
           'email'    => 'ali@yahoo.com',
           'phoneNo'     => '01296901954',
           'image'     => 'src/backend/dist/img/avatar5.png',
           'job'     => 'i\'am a SEO',
           'user_id'     => 3,
           'password'     => bcrypt('666666'),
         ],
         [
           'id'           => 4,
           'name'     => 'ahmad tellzem',
           'email'    => 'ahmad.tellzem@yahoo.com',
           'phoneNo'     => '01096901954',
           'image'     => 'src/backend/dist/img/avatar5.png',
           'job'     => 'i\'am a web Call Center',
           'user_id'     => 3,
           'password'     => bcrypt('666666'),
         ],
         [
           'id'           => 5,
           'name'     => 'sasuke_alaa',
           'email'    => 'sasuke_alaa@yahoo.com',
           'phoneNo'     => '013901954',
           'image'     => 'src/backend/dist/img/avatar5.png',
           'job'     => 'i\'am a graphic',
           'user_id'     => 3,
           'password'     => bcrypt('666666'),
         ],
         [
           'id'           => 6,
           'name'     => 'moa_alaa',
           'email'    => 'moa_alaa@yahoo.com',
           'phoneNo'     => '01094901954',
           'image'     => 'src/backend/dist/img/avatar5.png',
           'job'     => 'i\'am a adminstrator',
           'user_id'     => 3,
           'password'     => bcrypt('666666'),
         ],
       ];
       DB::table('teamWorks')->insert($teamWork);
    }
}
