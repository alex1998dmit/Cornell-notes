<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Subject;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=1; $i < 5; $i++) {
	    	Subject::create([
                'name' => str_random(8),
                'user_id' => $i,
	        ]);
    	}
    }
}
