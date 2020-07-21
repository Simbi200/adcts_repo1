<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($i = 0; $i<5; $i++):

        DB::table('users')->insert([
          'password' => Hash::make('000000'),
          'username' => $faker->lastName,
          'first_name' => $faker->firstName,
          'last_name' => $faker->lastName,
          'position' => $faker->word." ".$faker->word,
          'dob' => $faker->date(),
          'joined_on' => $faker->date(),
          'profile_pic' => "default",
          'bio' => $faker->sentence." ".$faker->sentence,
          'type' => $faker->boolean,
          'sex' => $faker->boolean,
      ]);
        endfor;



        for($i=0; $i < 10; $i++):
        DB::table('education')->insert([
            'employee_id' => $faker->numberBetween($min = 1, $max=15),
            'institution' => $faker->firstName." ".$faker->firstName,
            'qualification' => $faker->word.$i,
            'description' => $faker->sentence." ".$faker->sentence,
            'start_year' => $faker->date(),
            'end_year' => $faker->date(),
            'finished' => $faker->boolean,
        ]);
        endfor;

        for($i=0; $i < 10; $i++):
        DB::table('comments')->insert([
            'sender' => $faker->firstName,
            'subject' => $faker->sentence,
            'created_at' => $faker->dateTimeBetween(Carbon::now('GMT+2')->subMonths(3), Carbon::now('GMT+2')) ,
            'comment' => $faker->paragraph."\n".$faker->paragraph."\n".$faker->paragraph."\n".$faker->paragraph,
        ]);
        endfor;

        for($i=0; $i < 10; $i++):
        DB::table('audio_programs')->insert([
            'name' => $faker->word,
            'program' => $faker->safeEmail,
            'episode_number' => $faker->numberBetween($min = 1, $max=25),
            'first_aired_on' => $faker->date(),
            'aired' => $faker->boolean
        ]);
        endfor;

        for($i=0; $i < 10; $i++):
        DB::table('impacts')->insert([
            'title' => $faker->firstName,
            'description' => $faker->sentence." ".$faker->sentence." ".$faker->sentence." ".$faker->sentence,
        ]);
        endfor;

        for($i=0; $i < 5; $i++):
        DB::table('tasks')->insert([
            'name' => $faker->word,
        ]);
        endfor;

        for($i=0; $i < 10; $i++):
        DB::table('galleries')->insert([
            'name' => "gallery-image".$i,
            'description' => $faker->sentence,
        ]);
        endfor;



        for($i=0; $i < 10; $i++):
        DB::table('emails')->insert([
            'user_id' => $faker->numberBetween($min = 1, $max=15),
            'email_address' => $faker->safeEmail,
        ]);
        endfor;

        for($i=0; $i < 10; $i++):
        DB::table('partners')->insert([
            'name' => $faker->firstName,
            'logo' => "part_logo".$i,
            'description' => $faker->sentence,
            'email' => $faker->safeEmail,
        ]);
        endfor;

        for($i=0; $i < 10; $i++):
        DB::table('phones')->insert([
            'user_id' => $faker->numberBetween($min = 1, $max=15),
            'phone_number' => "0".$faker->numberBetween($min = 881970751, $max=992970751),
            'public' => $faker->boolean
        ]);
        endfor;

        for($i=0; $i < 10; $i++):
        DB::table('projects')->insert([
            'title' => $faker->word.$i,
            'description' => $faker->sentence,
            'starts' => $faker->date(),
            'ends' => $faker->date(),
        ]);
        endfor;

        for($i=0; $i < 10; $i++):
        DB::table('reports')->insert([
            'title' => $faker->word.$i,
            'path' => $faker->word.$i,
            'submitted_by' => $faker->firstName." ".$faker->lastName,
            'description' => $faker->sentence,
            'submitted_on' => $faker->date(),
        ]);
        endfor;

        for($i=0; $i < 6; $i++):
        DB::table('vacancies')->insert([
            'post' => $faker->word.$i,
            'due' => $faker->date(),
            'description' => $faker->sentence,
        ]);
        endfor;

        for($i=0; $i < 10; $i++):
        DB::table('vacancy_applications')->insert([
            'applicant' => $faker->firstName." ".$faker->lastName,
            'cover' =>  $faker->word.$i,
            'cv' =>  $faker->word.$i,
            'due' => $faker->date(),
            'vacancy_id' => $faker->numberBetween($min = 1, $max=6),
        ]);
        endfor;

    }
}
