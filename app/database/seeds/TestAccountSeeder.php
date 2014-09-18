<?php
class TestAccountSeeder extends Seeder {
    public function run()
    {
        User::truncate();
        
        $user = new User;
        $user->username = 'test';
        $user->password = Hash::make('test');
        $user->fullname = 'Test Account';
        $user->group = 0;
        $user->save();
    }
}