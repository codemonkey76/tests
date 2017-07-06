<?php

use App\Belts;
use App\Tests;
use App\Answers;
use App\Results;
use App\Questions;
use App\Test_Questions;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        // User::delete();
        User::truncate();
        User::create([
            'email' => 'shane@bjja.com.au',
            'name' => 'Shane Poppleton',
            'password' => Hash::make('e4f85967'),
            'belt_id' => 25,
            'active' => true,
            'can_promote' => true
        ]);

        // Belts::delete();
        Belts::truncate();
        $belts = array(
            'White Belt',
            'White Belt 1st Degree',
            'White Belt 2nd Degree',
            'White Belt 3rd Degree',
            'White Belt 4th Degree',
            'Yellow Belt',
            'Orange Belt',
            'Green Belt',
            'Blue Belt',
            'Blue Belt 1st Degree',
            'Blue Belt 2nd Degree',
            'Blue Belt 3rd Degree',
            'Blue Belt 4th Degree',
            'Purple Belt',
            'Purple Belt 1st Degree',
            'Purple Belt 2nd Degree',
            'Purple Belt 3rd Degree',
            'Purple Belt 4th Degree',
            'Brown Belt',
            'Brown Belt 1st Degree',
            'Brown Belt 2nd Degree',
            'Brown Belt 3rd Degree',
            'Brown Belt 4th Degree',
            'Black Belt',
            'Black Belt (Professor)',
            'Black Belt 1st Degree',
            'Black Belt 2nd Degree',
            'Black Belt 3rd Degree',
            'Black Belt 4th Degree',
            'Black Belt 5th Degree',
            'Black Belt 6th Degree'
        );

        $pictures = array(
            'white',
            'white-1',
            'white-2',
            'white-3',
            'white-4',
            'yellow',
            'orange',
            'green',
            'blue',
            'blue-1',
            'blue-2',
            'blue-3',
            'blue-4',
            'purple',
            'purple-1',
            'purple-2',
            'purple-3',
            'purple-4',
            'brown',
            'brown-1',
            'brown-2',
            'brown-3',
            'brown-4',
            'black',
            'black-p',
            'black-1',
            'black-2',
            'black-3',
            'black-4',
            'black-5',
            'black-6'
        );
        for ($i = 0; $i<count($belts);$i++)
        {
                $belt = new Belts;
                $belt->name = $belts[$i];
                $belt->picture = $pictures[$i];
                $belt->save();
        }
        
        // Questions::delete();
        Questions::truncate();
        
        $question = new Questions;
        $question->question = 'Who is the head of Fight Club Jiu-Jitsu Australia';
        $question->answer_id = 1;
        $question->save();

        $question = new Questions;
        $question->question = 'What country did BJJ originate from';
        $question->answer_id = 6;
        $question->save();

        $question = new Questions;
        $question->question = 'What submission becomes legal at Blue Belt';
        $question->answer_id = 11;
        $question->save();

        // Answers::delete();
        Answers::truncate();

        $answer = new Answers;
        $answer->question_id = 1;
        $answer->Answer = 'Daniel Lima';
        $answer->save();

        $answer = new Answers;
        $answer->question_id = 1;
        $answer->answer = 'Shane Poppeton';
        $answer->save();
        
        $answer = new Answers;
        $answer->question_id = 1;
        $answer->answer = 'Paulo Mauricio Strauch';
        $answer->save();
        
        $answer = new Answers;
        $answer->question_id = 1;
        $answer->answer = 'Marcio Bittencourt';
        $answer->save();
        
        $answer = new Answers;
        $answer->question_id = 1;
        $answer->answer = 'Geordie Lavers-McBain';
        $answer->save();
        
        $answer = new Answers;
        $answer->question_id = 2;
        $answer->answer = 'Brazil';
        $answer->save();
        
        $answer = new Answers;
        $answer->question_id = 2;
        $answer->answer = 'Australia';
        $answer->save();
        
        $answer = new Answers;
        $answer->question_id = 2;
        $answer->answer = 'Japan';
        $answer->save();
        
        $answer = new Answers;
        $answer->question_id = 2;
        $answer->answer = 'Korea';
        $answer->save();
        
        $answer = new Answers;
        $answer->question_id = 2;
        $answer->answer = 'Portugal';
        $answer->save();
        
        $answer = new Answers;
        $answer->question_id = 3;
        $answer->answer = 'Wrist Lock';
        $answer->save();
        
        $answer = new Answers;
        $answer->question_id = 3;
        $answer->answer = 'Kneebar';
        $answer->save();
        
        $answer = new Answers;
        $answer->question_id = 3;
        $answer->answer = 'Armbar';
        $answer->save();
        
        $answer = new Answers;
        $answer->question_id = 3;
        $answer->answer = 'Toe Hold';
        $answer->save();
        
        $answer = new Answers;
        $answer->question_id = 3;
        $answer->answer = 'Omoplata';
        $answer->save();
        
        // Tests::delete();
        Tests::truncate();

        $test = new Tests;
        $test->belt_id = 1;
        $test->name = 'Test for 1st Stripe White Belt';
        $test->save();

        $test = new Tests;
        $test->belt_id = 1;
        $test->name = 'Test for 1st Stripe White Belt - Version 2';
        $test->save();

        // TestQuestions::delete();
        Test_Questions::truncate();

        $testIds = array(1, 1, 1, 2, 2, 2);
        $questionIds = array(1, 2, 3, 3, 2, 1);

        for ($i=0; $i<count($testIds);$i++)
        {
            $testquestion = new Test_Questions;
            $testquestion->test_id = $testIds[$i];
            $testquestion->question_id = $questionIds[$i];
            $testquestion->save();
        }

        // Results::delete();
        Results::truncate();

        $results = new Results;
        $results->test_id = 1;
        $results->user_id = 1;
        $results->question_id = 1;
        $results->answer_id = 1;
        $results->save();

        $results = new Results;
        $results->test_id = 1;
        $results->user_id = 1;
        $results->question_id = 2;
        $results->answer_id = 6;
        $results->save();

        $results = new Results;
        $results->test_id = 1;
        $results->user_id = 1;
        $results->question_id = 3;
        $results->answer_id = 11;
        $results->save();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}