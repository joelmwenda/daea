<?php

use Illuminate\Database\Seeder;

class LookupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('result_codes')->insert([
		    ['id' => 0, 'result_code' => 'Success'],
		    ['id' => 1, 'result_code' => 'Insufficient Funds'],
		    ['id' => 2, 'result_code' => 'Less Than Minimum Transaction Value'],
		    ['id' => 3, 'result_code' => 'More Than Maximum Transaction Value'],
		    ['id' => 4, 'result_code' => 'Would Exceed Daily Transfer Limit'],
		    ['id' => 5, 'result_code' => 'Would Exceed Minimum Balance'],
		    ['id' => 6, 'result_code' => 'Unresolved Primary Party'],
		    ['id' => 7, 'result_code' => 'Unresolved Receiver Party'],
		    ['id' => 8, 'result_code' => 'Would Exceed Maxiumum Balance'],
		    ['id' => 11, 'result_code' => 'Debit Account Invalid'],
		    ['id' => 12, 'result_code' => 'Credit Account Invalid'],
		    ['id' => 13, 'result_code' => 'Unresolved Debit Account'],
		    ['id' => 14, 'result_code' => 'Unresolved Credit Account'],
		    ['id' => 15, 'result_code' => 'Duplicate Detected'],
		    ['id' => 17, 'result_code' => 'Internal Failure'],
		    ['id' => 20, 'result_code' => 'Unresolved Initiator'],
		    ['id' => 26, 'result_code' => 'Traffic blocking condition in place'],
		]);
    }
}
