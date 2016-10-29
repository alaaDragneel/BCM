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
         // admin user`
        $user = new User();
        $user->name = 'alaaDragneel';
        $user->phoneNo = '01096901954';
        $user->email = 'alaa_dragneel@yahoo.com';
        $user->job = 'web develpment';
        $user->image = 'src/backend/dist/img/avatar5.png';
        $user->userType = 1;
        $user->password = bcrypt('666666');
        $user->save();
        // individual user
        $user = new User();
        $user->name = 'sasuke_alaa';
        $user->phoneNo = '01196901954';
        $user->email = 'sasuke_alaa@yahoo.com';
        $user->job = 'Web Design';
        $user->image = 'src/backend/dist/img/avatar5.png';
        $user->userType = 2;
        $user->password = bcrypt('666666');
        $user->save();
        // company user
        $user = new User();
        $user->name = 'moaalaa';
        $user->phoneNo = '01296901954';
        $user->email = 'moaalaa@yahoo.com';
        $user->job = 'SEO';
        $user->image = 'src/backend/dist/img/avatar5.png';
        $user->userType = 3;
        $user->password = bcrypt('666666');
        $user->save();
    }
}
