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

    $Users =
    [
      [ // userType == 1 => admin
        'firstName'     => 'alaa',
        'lastName'      => 'Dragneel',
        'name'          => 'alaaDragneel',
        'phoneNo'       => '01096901954',
        'email'         => 'alaa_dragneel@yahoo.com',
        'job'           => 'web develpment',
        'image'         => 'src/frontend/dist/img/avatar5.png',
        'back_image'    => 'src/frontend/dist/img/photo1.png',
        'userType'      => 1,
        'description'   => 'i\'am a web development',
        'verified'   => 1,
        'password'      => bcrypt('666666'),
      ],
      [ // userType == 2 => startup
        'firstName'     => 'moa',
        'lastName'      => 'Alaa',
        'name'          => 'moaalaa',
        'phoneNo'       => '01196901954',
        'email'         => 'moaalaa@yahoo.com',
        'job'           => 'web design',
        'image'         => 'src/frontend/dist/img/avatar4.png',
        'back_image'    => 'src/frontend/dist/img/photo2.png',
        'userType'      => 2,
        'description'   => 'i\'am a web design',
        'verified'   => 1,
        'password'      => bcrypt('666666'),
      ],
      [ // userType == 3 => company
        'firstName'     => 'sasuke',
        'lastName'      => 'alaa',
        'name'          => 'sasuke_alaa',
        'phoneNo'       => '01069901954',
        'email'         => 'sasuke_alaa@yahoo.com',
        'job'           => 'SEO',
        'image'         => 'src/frontend/dist/img/avatar3.png',
        'back_image'    => 'src/frontend/dist/img/photo4.jpg',
        'userType'      => 3,
        'description'   => 'i\'am a SEO',
        'verified'   => 1,
        'password'      => bcrypt('666666'),
      ],
    ];
    $usersCreate = DB::table('users')->insert($Users);
    if ($usersCreate) {
      for($i = 0; $i >= 3; ++$i) {
        // main directory path
        $path = public_path() . '/src/users/user@'.$i;
        // files directory path
        $pathFiles = public_path() . '/src/users/user@'.$i.'/files';
        // image directory path
        $pathImg = public_path() . '/src/users/user@'.$i.'/img';
        if (!file_exists($path)) {
          // create the main directory
          $oldmask = umask(0);
          $dir = mkdir($path, 0777);
          umask($oldmask);
        }
        if (!file_exists($pathFiles)) {
          // make the files directory
          $oldmask = umask(0);
          $file = mkdir($pathFiles, 0777);
          umask($oldmask);
        }
        if (!file_exists($pathImg)) {
          // make the img directory
          $oldmask = umask(0);
          $img = mkdir($pathImg, 0777);
          umask($oldmask);
        }
      }
    }
  }
}
