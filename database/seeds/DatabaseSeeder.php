<?php

use App\Belts;
use App\Tests;
use App\Answers;
use App\Results;
use App\Questions;
use App\TestQuestions;
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
            'BeltId' => 21
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
                $belt->Name = $belts[$i];
                $belt->Picture = $pictures[$i];
                $belt->save();
        }
        
        // Questions::delete();
        Questions::truncate();
        
        $question = new Questions;
        $question->Question = 'Who is the head of Fight Club Jiu-Jitsu Australia';
        $question->AnswerId = 1;
        $question->save();

        $question = new Questions;
        $question->Question = 'What country did BJJ originate from';
        $question->AnswerId = 6;
        $question->save();

        $question = new Questions;
        $question->Question = 'What submission becomes legal at Blue Belt';
        $question->AnswerId = 11;
        $question->save();

        // Answers::delete();
        Answers::truncate();

        $answer = new Answers;
        $answer->QuestionId = 1;
        $answer->Answer = 'Daniel Lima';
        $answer->save();

        $answer = new Answers;
        $answer->QuestionId = 1;
        $answer->Answer = 'Shane Poppeton';
        $answer->save();
        
        $answer = new Answers;
        $answer->QuestionId = 1;
        $answer->Answer = 'Paulo Mauricio Strauch';
        $answer->save();
        
        $answer = new Answers;
        $answer->QuestionId = 1;
        $answer->Answer = 'Marcio Bittencourt';
        $answer->save();
        
        $answer = new Answers;
        $answer->QuestionId = 1;
        $answer->Answer = 'Geordie Lavers-McBain';
        $answer->save();
        
        $answer = new Answers;
        $answer->QuestionId = 2;
        $answer->Answer = 'Brazil';
        $answer->save();
        
        $answer = new Answers;
        $answer->QuestionId = 2;
        $answer->Answer = 'Australia';
        $answer->save();
        
        $answer = new Answers;
        $answer->QuestionId = 2;
        $answer->Answer = 'Japan';
        $answer->save();
        
        $answer = new Answers;
        $answer->QuestionId = 2;
        $answer->Answer = 'Korea';
        $answer->save();
        
        $answer = new Answers;
        $answer->QuestionId = 2;
        $answer->Answer = 'Portugal';
        $answer->save();
        
        $answer = new Answers;
        $answer->QuestionId = 3;
        $answer->Answer = 'Wrist Lock';
        $answer->save();
        
        $answer = new Answers;
        $answer->QuestionId = 3;
        $answer->Answer = 'Kneebar';
        $answer->save();
        
        $answer = new Answers;
        $answer->QuestionId = 3;
        $answer->Answer = 'Armbar';
        $answer->save();
        
        $answer = new Answers;
        $answer->QuestionId = 3;
        $answer->Answer = 'Toe Hold';
        $answer->save();
        
        $answer = new Answers;
        $answer->QuestionId = 3;
        $answer->Answer = 'Omoplata';
        $answer->save();
        
        // Tests::delete();
        Tests::truncate();

        $test = new Tests;
        $test->BeltId = 1;
        $test->Name = 'Test for 1st Stripe White Belt';
        $test->save();

        $test = new Tests;
        $test->BeltId = 1;
        $test->Name = 'Test for 1st Stripe White Belt - Version 2';
        $test->save();

        // TestQuestions::delete();
        TestQuestions::truncate();

        $testIds = array(1, 1, 1, 2, 2, 2);
        $questionIds = array(1, 2, 3, 3, 2, 1);

        for ($i=0; $i<count($testIds);$i++)
        {
            $testquestion = new TestQuestions;
            $testquestion->TestId = $testIds[$i];
            $testquestion->QuestionId = $questionIds[$i];
            $testquestion->save();
        }

        // Results::delete();
        Results::truncate();

        $results = new Results;
        $results->TestId = 1;
        $results->UserId = 1;
        $results->QuestionId = 1;
        $results->AnswerId = 1;
        $results->save();

        $results = new Results;
        $results->TestId = 1;
        $results->UserId = 1;
        $results->QuestionId = 2;
        $results->AnswerId = 6;
        $results->save();

        $results = new Results;
        $results->TestId = 1;
        $results->UserId = 1;
        $results->QuestionId = 3;
        $results->AnswerId = 11;
        $results->save();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}