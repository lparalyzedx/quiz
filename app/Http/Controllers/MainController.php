<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Answer;
use App\Models\Result;

class MainController extends Controller
{
    public function dashboard()
    {
        $quizzes = Quiz::where('status', 'publish')->withCount('questions')->paginate(4);
        return view('dashboard', compact('quizzes'));
    }

    public function quiz_detail($slug)
    {
        $quiz= Quiz::whereSlug($slug)->with('results','my_result','topTen.user')->withCount('questions')->first();
        return view('details', compact('quiz'));
    }

    public function quiz($slug)
    {
       $quiz= Quiz::whereSlug($slug)->with('questions.myAnswer')->first() ?? abort(404, 'quiz bulunamadı');
        
        if($quiz->my_result){
            return view('result',compact('quiz'));
        }
        return view('question', compact('quiz'));
        
    }

    public function result(Request $request, $slug)
    {
        $quiz = Quiz::whereSlug($slug)->with('questions')->first() ?? abort(404, 'Quiz Bulunamadı');
        $correct = 0;
        foreach ($quiz->questions as $question) {

            Answer::create([
                'user_id' => auth()->user()->id,
                'question_id' => $question->id,
                'answer' => $request->post($question->id)
            ]);

            if ($question->correct_answer === $request->post($question->id)) {
                $correct += 1;
            }
        }
        $point = round(100 / count($quiz->questions) * $correct);
        $wrong = abs(round($quiz->questions->count()) - $correct);

        result::create([
            'user_id' => auth()->user()->id,
            'quiz_id' =>  $quiz->id,
            'point' => $point,
            'correct' => $correct,
            'wrong' => $wrong
        ]);

        return redirect()->route('quiz.detail',$quiz->slug)->withSuccess('Quizi Başarıyla Bitirdin Puanın : '.$point);
    }
}
