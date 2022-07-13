<x-app-layout>
    <x-slot name="header">
       {{$quiz->title}} Quizi için Soru Oluştur
    </x-slot>
    
    <div class="card">
        <div class="card-body">
        <form action="{{route('questions.store',$quiz->id)}}" method="POST" enctype="multipart/form-data" >
        @csrf
        <div class="form-group">
            <label>Soru</label>
            <textarea type="text" rows="3" name="question" class="form-control" required>{{old('question')}}</textarea>
        </div>
        <br>
        <div class="form-group">
            <label>Fotograf</label>
            <input type="file" name="image" class="form-control">
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>1. Cevap</label>
                    <textarea name="answer1" rows="1" class="form-control">{{old('answer1')}}</textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>2. Cevap</label>
                    <textarea name="answer2" rows="1" class="form-control">{{old('answer2')}}</textarea>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>3. Cevap </label>
                    <textarea name="answer3" rows="1" class="form-control">{{old('answer3')}}</textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>4. Cevap </label>
                    <textarea name="answer4" rows="1" class="form-control">{{old('answer4')}}</textarea>
                </div>
            </div>
        </div>
        <br>
        <div class="form-group">
            <label>Doğru Cevap</label>
            <select name="correct_answer" class="form-control">
                <option @if(old('correct_answer')==='answer1') selected @endif value="answer1">1. Cevap</option>
                <option @if(old('correct_answer')==='answer2') selected @endif value="answer2">2. Cevap</option>
                <option @if(old('correct_answer')==='answer3') selected @endif value="answer3">3. Cevap</option>
                <option @if(old('correct_answer')==='answer4') selected @endif value="answer4">4. Cevap</option>
            </select>
        </div>
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-sm w-100 py-1 btn-block"> Quiz Oluştur</button>
        </div>
       </form>
       </div>
    </div>
      

</x-app-layout>