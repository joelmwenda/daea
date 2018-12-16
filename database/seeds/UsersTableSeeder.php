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

        $user = factory(App\User::class, 1)->create([
	        'user_type_id' => 1,
	        'name' => 'Joel Kithinji',
	        'email' => 'joelkith@gmail.com',
    	]);

        $users = factory(App\User::class, 25)->create();
        $occasions = factory(App\Occasion::class, 10)->create();
    	$payments = factory(App\Payment::class, 20)->create();
    }
}
