<?php

class RolesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('roles')->delete();

        $adminRole = new Role;
        $adminRole->name = 'admin';
        $adminRole->save();

        $userRole = new Role;
        $userRole->name = 'user';
        $userRole->save();

        $sellerRole = new Role;
        $sellerRole->name = 'seller';
        $sellerRole->save();

        $user = User::where('username','=','admin')->first();
        $user->attachRole( $adminRole );

    }

}
