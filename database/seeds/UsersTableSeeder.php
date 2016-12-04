<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    DB::statement('SET FOREIGN_KEY_CHECKS=0');
    DB::table('users')->truncate();

    $Users = [
      [ // userType == 1 => admin
        'firstName'     => 'alaa',
        'lastName'      => 'Dragneel',
        'name'          => 'alaaDragneel',
        'phoneNo'       => '01096901954',
        'email'         => 'alaa_dragneel@yahoo.com',
        'job'           => 'web develpment',
        'image'         => 'src/backend/dist/img/avatar5.png',
        'back_image'    => 'src/backend/dist/img/photo1.png',
        'userType'      => 1,
        'description'   => 'i\'am a web development',
        'password'      => bcrypt('666666'),
      ],
      [ // userType == 2 => startup
        'firstName'     => 'moa',
        'lastName'      => 'Alaa',
        'name'          => 'moaalaa',
        'phoneNo'       => '01196901954',
        'email'         => 'moaalaa@yahoo.com',
        'job'           => 'web design',
        'image'         => 'src/backend/dist/img/avatar4.png',
        'back_image'    => 'src/backend/dist/img/photo2.png',
        'userType'      => 2,
        'description'   => 'i\'am a web design',
        'password'      => bcrypt('666666'),
      ],
      [ // userType == 3 => company
        'firstName'     => 'sasuke',
        'lastName'      => 'alaa',
        'name'          => 'sasuke_alaa',
        'phoneNo'       => '01069901954',
        'email'         => 'sasuke_alaa@yahoo.com',
        'job'           => 'SEO',
        'image'         => 'src/backend/dist/img/avatar3.png',
        'back_image'    => 'src/backend/dist/img/photo4.png',
        'userType'      => 3,
        'description'   => 'i\'am a SEO',
        'password'      => bcrypt('666666'),
        ],
        ];
        DB::table('users')->insert($Users);
      }
    }
