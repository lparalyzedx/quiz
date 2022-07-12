<x-app-layout>
    <x-slot name="header">
        Quizler
    </x-slot>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><a  href="quizzes.create" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i>&nbsp;Quiz Oluştur</a></h5>
            <table class="table table-bordered">
                  <tr>
                    <th scope="col">Quiz</th>
                    <th scope="col">Durum</th>
                    <th scope="col">Bitiş Tarihi</th>
                    <th scope="col">İşlemler</th>
                  </tr>
                </thead>
                <tbody>
                 @foreach ($quizzes as $quiz )
                 <tr>
                    <td>{{$quiz->title}}</td>
                    <td>{{$quiz->status}}</td>
                    <td>{{$quiz->finished_at}}</td>
                    <td>
                        <a href="" class="btn btn-sm btn-danger" title="sil"><i class="fas fa-times"></i></a>
                        <a href="" class="btn btn-sm btn-primary" title="düzenle"><i class="fas fa-pencil"></i></a>
                    </td>
                  </tr>
                 @endforeach
                </tbody>
              </table>
              {{$quizzes->links()}}
        </div>
    </div>
</x-app-layout>