<x-app-layout>
    <x-slot name="header">
       {{$question->question}} Sorusunu Güncelle
    </x-slot>
    
    <div class="card">
        <div class="card-body">
        <form action="{{route('questions.update',[$quiz->id,$question->id])}}" method="POST" enctype="multipart/form-data" >
        @method('PUT')
        @csrf
        <div class="form-group">
            <label>Soru</label>
            <textarea type="text" rows="3" name="question" class="form-control" required>{{$question->question}}</textarea>
        </div>
        <br>
        <div class="form-group">
            <label>Fotograf</label>
            <img src="{{asset($question->image)}}" width="120" alt="">
            <input type="file" name="image" class="form-control">
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>1. Cevap</label>
                    <textarea name="answer1" rows="1" class="form-control">{{$question->answer1}}</textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>2. Cevap</label>
                    <textarea name="answer2" rows="1" class="form-control">{{$question->answer2}}</textarea>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>3. Cevap </label>
                    <textarea name="answer3" rows="1" class="form-control">{{$question->answer3}}</textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>4. Cevap </label>
                    <textarea name="answer4" rows="1" class="form-control">{{$question->answer4}}</textarea>
                </div>
            </div>
        </div>
        <br>
        <div class="form-group">
            <label>Doğru Cevap</label>
            <select name="correct_answer" class="form-control">
                <option @if($question->correct_answer==='answer1') selected @endif value="answer1">1. Cevap</option>
                <option @if($question->correct_answer==='answer2') selected @endif value="answer2">2. Cevap</option>
                <option @if($question->correct_answer==='answer3') selected @endif value="answer3">3. Cevap</option>
                <option @if($question->correct_answer==='answer4') selected @endif value="answer4">4. Cevap</option>
            </select>
        </div>
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-sm w-100 py-1 btn-block"> Quiz Güncelle</button>
        </div>
       </form>
       </div>
    </div>
      

</x-app-layout>