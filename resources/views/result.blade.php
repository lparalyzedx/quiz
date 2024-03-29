<x-app-layout>
    <x-slot name='header'>{{ $quiz->title }} Sonucu</x-slot>

    <div class="card">
        <div class="card-body">
            <div class="alert alert-light">
                <h2>Puan: {{$quiz->my_result->point}}</h2>
            </div>
            <div class="alert alert-light">
                <i class="fa fa-square"></i> İşaretlediğin Şık <br>
                <i class="fa fa-check text-success"></i> Doğru Cevap <br>
                <i class="fa fa-times text-danger"></i> Yanlış Cevap
            </div>
                    @foreach ($quiz->questions as $question)
                    <strong>
                        @if($question->myanswer->answer==$question->correct_answer)
                           <i class="fa fa-check text-success"></i>
                        @else
                        <i class="fa fa-times text-danger"></i>
                        @endif
                        #{{ $loop->iteration }} {{ $question->question }}</strong>

                    @if($question->image)
                    <img src="{{asset($question->image)}}"  style="width: 50%; margin:5px 0;" alt="">
                    @endif
                    <br>
                    <small>Bu soruya <strong>%{{$question->true_percent}}</strong> oranında doğru cevap verildi</small>
                    <div class="form-check mt-2">
                        @if('answer1' ===$question->correct_answer)
                        <i class='fa fa-check text-success'></i>
                        @elseif('answer1' === $question->myanswer->answer)
                        <i class='fa fa-square'></i>
                        @endif
                        <label class="form-check-label" for="quiz{{ $question->id }}1">
                            {{ $question->answer1 }}
                        </label>
                    </div>
                    <div class="form-check">
                       @if('answer2' ===$question->correct_answer)
                       <i class='fa fa-check text-success'></i>
                       @elseif('answer2' === $question->myanswer->answer)
                       <i class='fa fa-square'></i>
                       @endif
                        <label class="form-check-label" for="quiz{{ $question->id }}2">
                            {{ $question->answer2 }}
                        </label>
                    </div>
                    <div class="form-check">
                        @if('answer3' ===$question->correct_answer)
                        <i class='fa fa-check text-success'></i>
                        @elseif('answer3' === $question->myanswer->answer)
                        <i class='fa fa-square'></i>
                        @endif
                        <label class="form-check-label" for="quiz{{ $question->id }}3">
                            {{ $question->answer3 }}
                        </label>
                    </div>
                    <div class="form-check">
                        @if('answer4' ===$question->correct_answer)
                        <i class='fa fa-check text-success'></i>
                        @elseif('answer4' === $question->myanswer->answer)
                        <i class='fa fa-square'></i>
                        @endif
                        <label class="form-check-label" for="quiz{{ $question->id }}4">
                            {{ $question->answer4 }}
                        </label>
                    </div>
                        @if(!$loop->last)
                        <hr>
                        @endif
                @endforeach
            </>
        </div>
    </div>
</x-app-layout>
