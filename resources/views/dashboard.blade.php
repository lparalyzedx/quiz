<x-app-layout>
    <x-slot name="header">
        Anasayfa
    </x-slot>
    <div class="row">
        <div class="col-md-8">
            @foreach ($quizzes as $quiz )
            <div class="list-group">
                <a href="{{route('quiz.detail',$quiz->slug)}}" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{$quiz->title}}</h5>
                        <small>{{$quiz->finished_at? $quiz->finished_at->diffForHumans() . ' bitiyor.': null}}</small>
                    </div>
                    <p class="mb-1">
                        {{Str::limit($quiz->description,100)}}
                    </p>
                    <small>{{$quiz->questions_count}} soru</small>
                </a>
            </div>
            @endforeach
            <div class="mt-2">
                {{$quizzes->WithQueryString()->links()}}
            </div>
        </div>
        <div class="col-md-4">
           <div class="card">
            <div class="card-header">
                Quiz Sonuçları
            </div>
           
                <ul class="list-group">
                    @foreach ($results as $result )
                    <li class="list-group-item">{{$result->point}} - <a  class='btn' href="{{route('quiz.detail',$result->quiz->slug)}}">{{$result->quiz->title}}</a></li>
                    @endforeach
                </ul>
           </div>
        </div>
    </div>
</x-app-layout>
