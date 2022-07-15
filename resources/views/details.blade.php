<x-app-layout>
    <x-slot name="header">
        {{ $quiz->title }}
    </x-slot>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            @if($quiz->finished_at)
                            <li class="list-group-item">Bitiş Tarihi
                                <span class="badge rounded-pill float-right bg-secondary">{{$quiz->finished_at->diffForHumans()}}</span>
                            </li>
                            @endif
                            <li class="list-group-item">Soru Sayısı
                                <span class="badge rounded-pill float-right bg-secondary">{{$quiz->questions_count}}</span>
                            </li>
                            <li class="list-group-item">Katılımcı Sayısı
                                <span class="badge rounded-pill float-right bg-secondary">4</span>
                            </li>
                            <li class="list-group-item">Ortalama Puan
                                <span class="badge rounded-pill float-right bg-secondary">4</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <h5 class="card-title text-center">{{ $quiz->title }}</h5>
                    <p class="card-text">{{ $quiz->description }}</p>
                        <a href="{{route('quiz.join',$quiz->slug)}}" class="btn btn-primary btn-block" style="width: 100%">Quize Katıl</a>
                </div>
            </div>
        </div>

    </div>
    </div>
</x-app-layout>
