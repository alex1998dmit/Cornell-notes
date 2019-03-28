<?php

use Illuminate\Database\Seeder;
use App\Note;

class NotesTableSeeder extends Seeder
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
	    	Note::create([
	            'subject_id' => $i,
                'isOpen' => 1,
                'leftColumn' => str_random(30),
                'rightColumn'=> str_random(40),
                'bottemColumn' => str_random(20),
                'theme' => str_random(10),
	        ]);
    	}
    }
}
