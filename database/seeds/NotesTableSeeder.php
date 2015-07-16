<?php

use Illuminate\Database\Seeder;
use App\Note;

class NotesTableSeeder extends Seeder {

   public function run()
   {
       DB::table('notes')->delete();

       Note::create([
           'note' => 'The Name'
       ]);

   }

}
