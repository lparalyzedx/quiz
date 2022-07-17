<x-app-layout>
    <x-slot name="header">
        {{ $quiz->title }}
    </x-slot>
    <div class="card">
        <div class="card-body">
            <a href="{{route('quizzes.index')}}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Geri Dön</a>
            <div class="row">
                <div class="col-md-4 mt-5">
                    <div class="card">
                        <ul class="list-group list-group-flush">

                            @if ($quiz->finished_at)
                                <li class="list-group-item">Bitiş Tarihi
                                    <span
                                        class="badge rounded-pill float-right bg-secondary">{{ $quiz->finished_at->diffForHumans() }}</span>
                                </li>
                            @endif
                            <li class="list-group-item">Soru Sayısı
                                <span
                                    class="badge rounded-pill float-right bg-warning text-dark">{{ $quiz->questions_count }}</span>
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
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Ad Soyad</th>
                            <th scope="col">Puan</th>
                            <th scope="col">Doğru</th>
                            <th scope="col">Yanlış</th>
                          </tr>
                        </thead>
                        <tbody>
                         @foreach ($quiz->topten as $result )

                         <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$result->user->name}}</td>
                            <td>{{$result->point}}</td>
                            <td>{{$result->correct}}</td>
                            <td>{{$result->wrong}}</td>
                          </tr>
                             
                         @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>

    </div>
    </div>
</x-app-layout>
