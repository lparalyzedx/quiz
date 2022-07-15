<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;

class MainController extends Controller
{
    public function dashboard()
    {
        $quizzes = Quiz::where('status', 'publish')->withCount('questions')->paginate(4);
        return view('dashboard', compact('quizzes'));
    }

    public function quiz_detail($slug)
    {
        $quiz = Quiz::whereSlug($slug)->withCount('questions')->first() ?? abort(404, 'quiz bulunamadı');
        return view('details',compact('quiz'));
    }

    public function quiz_join($slug)
    {
        $quiz= Quiz::whereSlug($slug)->with('questions')->first() ?? abort(404,'quiz bulunamadı');
        return view('question',compact('quiz'));
    }
}
