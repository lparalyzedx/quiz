<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Http\Requests\QuizCreateRequest;
use App\Http\Requests\QuizUpdateRequest;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes= Quiz::withCount('questions');

        // QUERY SEARCH

        if(request()->get('title')){
          $quizzes= $quizzes->where('title','LIKE','%'.request()->get('title').'%');
        }
        if(request()->get('status')){
           $quizzes= $quizzes->where('status',request()->get('status'));
        }
        
        $quizzes = $quizzes->paginate(5);
        return view('admin.quiz.list',compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quiz.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuizUpdateRequest $request)
    {
        Quiz::create($request->post());
        return redirect()->route('quizzes.index')->withSuccess('Quiz Başarıyla oluşturuldu');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quiz= Quiz::where('id',$id)->with('results.user')->withCount('questions')->first() ?? abort(404,'Quiz Bulunamadı');
        return view('admin.quiz.show',compact(('quiz')));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quiz= Quiz::find($id) ?? abort(404,'quiz bulunamadı');
        return view('admin.quiz.edit',compact('quiz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuizCreateRequest $request, $id)
    {
        Quiz::where('id',$id)->first()->update($request->except(['_method','_token']));

        return redirect()->route('quizzes.index')->withSuccess('Quiz Başarıyla Güncellendi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $quiz= Quiz::find($id) ?? abort(404,'quiz bulunamadı');
       $quiz->delete();
       return redirect()->back()->withSuccess('Quiz Başarıyla Silindi');
    }
}
