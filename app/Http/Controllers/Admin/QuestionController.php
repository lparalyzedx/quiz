<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Http\Requests\QuestionCreateRequest;
use App\Http\Requests\QuestionUpdateRequest;
use App\Models\Question;
use Illuminate\Support\Str;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
      $quiz = Quiz::whereId($id)->with('questions')->first() ?? abort(404,'quiz bulunamadı');
      return view('admin.question.list',compact('quiz'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $quiz= Quiz::find($id) ?? abort(404,'quiz bulunamadı');
        return view('admin.question.create',compact('quiz'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionCreateRequest $request,$id)
    {
        if($request->hasFile('image')){
            $imageName= Str::slug($request->question).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $request->merge([
                'image' => 'uploads/'.$imageName,
            ]);
        }
        Quiz::find($id)->questions()->create($request->post());
        return redirect()->route('questions.index',$id)->withSuccess('Soru Başarıyla Oluşturuldu');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($quiz_id,$question_id)
    {
        $quiz= Quiz::find($quiz_id) ?? abort(404,'quiz bulunamadı');
        $question= $quiz->questions()->whereId($question_id)->first() ?? abort(404,'soru bulunamadı');
        return view('admin.question.update',compact('quiz','question'));
        
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionUpdateRequest $request, $quiz_id,$question_id)
    {
        if($request->hasFile('image')){
            $imageName= Str::slug($request->question).'.'.$request->image->getClientOriginalExtension();
            $fileWithUpload= 'uploads/'.$imageName;
            $request->image->move(public_path('uploads'),$imageName);
            $request->merge([
                'image' => $fileWithUpload
            ]);
        }

        Quiz::find($quiz_id)->questions()->whereId($question_id)->first()->update($request->post());

        
        return redirect()->route('questions.index',$quiz_id)->withSuccess('Soru Başarıyla Güncellendi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($quiz_id,$id)
    {
        Quiz::find($quiz_id)->questions()->whereId($id)->delete();
        return redirect()->route('questions.index',$quiz_id)->withSuccess('Soru Başarıyla Silindi');
    }
}
