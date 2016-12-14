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
           'email'     => 'alaa_dragneel@moaalaa.gudi',
           'emailAddress'    => 'alaa_dragneel@yahoo.com',
           'phoneNo'     => '01093901954',
           'image'     => 'src/frontend/dist/img/avatar5.png',
           'back_image'     => 'src/frontend/dist/img/photo1.png',
           'job'     => 'i\'am a web development',
           'user_id'     => 2,
           'password'     => bcrypt('666666'),
         ],
         [
           'id'           => 2,
           'email'     => 'mohamed alaa@moaalaa.gudi',
           'emailAddress'    => 'moaalaa@yahoo.com',
           'phoneNo'     => '01196901594',
           'image'     => 'src/frontend/dist/img/avatar5.png',
           'back_image'     => 'src/frontend/dist/img/photo1.png',
           'job'     => 'i\'am a web desgin',
           'user_id'     => 2,
           'password'     => bcrypt('666666'),
         ],
         [
           'id'           => 3,
           'email'     => 'ali@moaalaa.gudi',
           'emailAddress'    => 'ali@yahoo.com',
           'phoneNo'     => '01296901954',
           'image'     => 'src/frontend/dist/img/avatar5.png',
           'back_image'     => 'src/frontend/dist/img/photo1.png',
           'job'     => 'i\'am a SEO',
           'user_id'     => 2,
           'password'     => bcrypt('666666'),
         ],
         [
           'id'           => 4,
           'email'     => 'ahmad tellzem@moaalaa.gudi',
           'emailAddress'    => 'ahmad.tellzem@yahoo.com',
           'phoneNo'     => '01096901954',
           'image'     => 'src/frontend/dist/img/avatar5.png',
           'back_image'     => 'src/frontend/dist/img/photo1.png',
           'job'     => 'i\'am a web Call Center',
           'user_id'     => 2,
           'password'     => bcrypt('666666'),
         ],
         [
           'id'           => 5,
           'email'     => 'sasuke_alaa@moaalaa.gudi',
           'emailAddress'    => 'sasuke_alaa@yahoo.com',
           'phoneNo'     => '013901954',
           'image'     => 'src/frontend/dist/img/avatar5.png',
           'back_image'     => 'src/frontend/dist/img/photo1.png',
           'job'     => 'i\'am a graphic',
           'user_id'     => 2,
           'password'     => bcrypt('666666'),
         ],
         [
           'id'           => 6,
           'email'     => 'moa_alaa@moaalaa.gudi',
           'emailAddress'    => 'moa_alaa@yahoo.com',
           'phoneNo'     => '01094901954',
           'image'     => 'src/frontend/dist/img/avatar5.png',
           'back_image'     => 'src/frontend/dist/img/photo1.png',
           'job'     => 'i\'am a adminstrator',
           'user_id'     => 2,
           'password'     => bcrypt('666666'),
         ],
       ];
       DB::table('teamWorks')->insert($teamWork);
    }
}
