<?php

class RolesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('roles')->delete();

        $adminRole = new Role;
        $adminRole->name = 'admin';
        $adminRole->save();

        $buyerRole = new Role;
        $buyerRole->name = 'buyer';
        $buyerRole->save();

        $sellerRole = new Role;
        $sellerRole->name = 'seller';
        $sellerRole->save();

        $user = User::where('username','=','admin')->first();
        $user->attachRole( $adminRole );

        $user = User::where('username','=','user')->first();
        $user->attachRole( $buyerRole );

        $user = User::where('username','=','user')->first();
        $user->attachRole( $sellerRole );
    }

}
