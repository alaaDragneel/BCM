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
        'id'           => 1,
        'firstName'     => 'alaa',
        'lastName'     => 'Dragneel',
        'phoneNo'    => '01096901954',
        'email'     => 'alaa_dragneel@yahoo.com',
        'job'     => 'web develpment',
        'image'     => 'src/backend/dist/img/avatar5.png',
        'userType'     => 1,
        'description'     => 'i\'am a web development',
        'password'     => bcrypt('666666'),
      ],
      [ // userType == 2 => individual user
        'id'           => 2,
        'firstName'     => 'sasuke',
        'lastName'     => 'alaa',
        'phoneNo'    => '01196901954',
        'email'     => 'sasuke_alaa@yahoo.com',
        'job'     => 'Web Design',
        'image'     => 'src/backend/dist/img/avatar5.png',
        'userType'     => 2,
        'description'     => 'i\'am a graphic desgnier',
        'password'     => bcrypt('666666'),
      ],
      [ // userType == 3 => company user
        'id'           => 3,
        'firstName'     => 'moa',
        'lastName'     => 'alaa',
        'phoneNo'    => '01296901954',
        'email'     => 'moaalaa@yahoo.com',
        'job'     => 'SEO',
        'image'     => 'src/backend/dist/img/avatar5.png',
        'userType'     => 3,
        'description'     => 'i\'am a SEO',
        'password'     => bcrypt('666666'),
        ],


        ];
        DB::table('users')->insert($Users);
      }
    }
