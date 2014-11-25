<?php
class TestAccountSeeder extends Seeder {
    public function run()
    {
        User::truncate();
        /* Admin account */
        $user = new User;
        $user->username = 'test';
        $user->password = Hash::make('test');
        $user->fullname = 'Test Account';
        $user->group = 2;
        $user->save();


        // for( $i = 0; $i < 20; $i++)
        // {
        //   $user = new User;
        //   $user->username = 'test'.$i;
        //   $user->password = Hash::make('test');
        //   $user->fullname = 'Test Account'.$i;
        //   $user->group = 0;
        //   $user->save();
        // }
    }
}
