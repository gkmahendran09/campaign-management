<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->delete();


      $users = array(
          array(
              'name'      => 'admin',
              'email'      => 'admin@example.org',
              'password'   => Hash::make('admin'),
              'remember_token' => md5(microtime().Config::get('app.key')),
              'created_at' => new DateTime,
              'updated_at' => new DateTime,
          )
      );

      DB::table('users')->insert( $users );
    }
}
