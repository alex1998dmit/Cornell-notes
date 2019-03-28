<?php

use Illuminate\Database\Seeder;
use App\Folder;

class FoldersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=2; $i < 5; $i++) {
	    	Folder::create([
	            'note_id' => $i,
	            'name' => str_random(12),
	        ]);
    	}
    }
}
