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

                            @if ($quiz->finished_at)
                                <li class="list-group-item">Bitiş Tarihi
                                    <span
                                        class="badge rounded-pill float-right bg-secondary">{{ $quiz->finished_at->diffForHumans() }}</span>
                                </li>
                            @endif

                            @if ($quiz->my_rank)
                            <li class="list-group-item">Sıralama
                                <span class="badge rounded-pill float-right bg-primary">#{{ $quiz->my_rank }}</span>
                            </li>
                            @endif

                            @if ($quiz->my_result != null)
                                <li class="list-group-item">Puan
                                    <span
                                        class="badge rounded-pill float-right bg-primary">{{ $quiz->my_result->point }}</span>
                                </li>


                                <li class="list-group-item">Doğru / Yanlış Sayısı
                                    <span
                                        class="badge rounded-pill float-right bg-success ml-1">{{ $quiz->my_result->correct }}
                                        Doğru</span>
                                    <span
                                        class="badge rounded-pill float-right bg-danger">{{ $quiz->my_result->wrong }}
                                        Yanlış</span>
                                </li>
                            @endif
                            <li class="list-group-item">Soru Sayısı
                                <span
                                    class="badge rounded-pill float-right bg-secondary">{{ $quiz->questions_count }}</span>
                            </li>
                            @if ($quiz->details != null)
                                <li class="list-group-item">Katılımcı Sayısı
                                    <span
                                        class="badge rounded-pill float-right bg-warning text-dark">{{ $quiz->details['join_count'] }}</span>
                                </li>
                                <li class="list-group-item">Ortalama Puan
                                    <span
                                        class="badge rounded-pill float-right bg-light text-dark">{{ $quiz->details['average'] }}</span>
                                </li>
                            @endif
                        </ul>
                    </div>
                   @if(count($quiz->results)>0)
                   <div class="card mt-3">
                    <div class="card-boy">
                        <h4 class="card-title text-muted text-center">ilk 10</h4>
                        <ul class="list-group">
                          @foreach ($quiz->topten as $result)
                          <li class="list-group-item text-center" style="display: flex; align-items:center; justify-content:space-between;">
                          <strong> {{$loop->iteration}}.</strong>
                          <img src="{{$result->user->profile_photo_url}}" style=" width:30px; height:30px; object-fit:cover; border-radius:100%;" alt="">
                            <span @if($result->user->id===auth()->user()->id) class="text-danger" @endif>{{$result->user->name}}</span>
                            <span class="badge bg-success float-right">{{$result->point}}</span>
                          </li>
                          @endforeach
                        </ul>


                    </div>
                </div>
                @endif
                </div>
                <div class="col-md-8 mt-3">
                    <h5 class="card-title text-center">{{ $quiz->title }}</h5>
                    <p class="card-text">{{ $quiz->description }}</p>
                    @if (!$quiz->my_result)
                        <a href="{{ route('quiz.join', $quiz->slug) }}" class="btn btn-primary btn-block"
                            style="width: 100%">Quize Katıl</a>
                    @else
                        <a href="{{ route('quiz.join', $quiz->slug) }}" class="btn btn-warning  text-dark btn-block"
                            style="width: 100%">Quiz'i Görüntüle</a>
                    @endif
                </div>
            </div>
        </div>

    </div>
    </div>
</x-app-layout>
