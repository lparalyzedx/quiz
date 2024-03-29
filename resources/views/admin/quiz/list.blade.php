<x-app-layout>
    <x-slot name="header">
        Quizler
    </x-slot>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title float-right"><a href="{{ route('quizzes.create') }}" class="btn btn-sm btn-primary"><i
                        class="fas fa-plus"></i>&nbsp;Quiz Oluştur</a></h5>

            <form method="GET" action="">
                <div class="row">
                    <div class="col-md-2">
                        <input type="text" name="title" class="form-control" placeholder="Quiz Adı"
                            value="{{ request()->get('title') }}">
                    </div>
                    <div class="col-md-2">
                        <select name="status" class="form-control" onchange="this.form.submit()">
                            <option value="">Durum Seçiniz</option>
                            <option @if (request()->get('status') === 'publish') selected @endif value="publish">Aktif</option>
                            <option @if (request()->get('status') === 'draft') selected @endif value="draft">Taslak</option>
                            <option @if (request()->get('status') === 'passive') selected @endif value="passive">Pasif</option>
                        </select>
                    </div>
                    @if (request()->get('title') || request()->get('status'))
                        <div class="col-md-1">
                            <a href="{{ route('quizzes.index') }}" class="btn btn-secondary">Sıfırla</a>
                        </div>
                    @endif
                </div>
            </form>

            <table class="table table-bordered table-sm">
                <tr class="text-center">
                    <th scope="col">Quiz</th>
                    <th scope="col">Durum</th>
                    <th scope="col">Soru Sayısı</th>
                    <th scope="col">Bitiş Tarihi</th>
                    <th scope="col">İşlemler</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($quizzes as $quiz)
                        <tr class="text-center">
                            <td>{{ $quiz->title }}</td>
                            <td>
                                @switch($quiz->status)
                                    @case('publish')
                                        @if($quiz->finished_at && $quiz->finished_at>now())
                                           <span class="badge bg-success">Aktif</span>
                                        @elseif(!$quiz->finished_at)
                                           <span class="badge bg-success">Aktif</span>
                                        @else
                                          <span class="badge bg-danger">Zamanı doldu</span>
                                        @endif
                                    @break

                                    @case('draft')
                                        <span class="badge bg-warning text-dark">Taslak</span>
                                    @break

                                    @case('passive')
                                        <span class="badge bg-danger">Pasif</span>
                                    @break
                                @endswitch
                            </td>
                            <td>{{ $quiz->questions_count }}</td>
                            <td>
                                <span title="{{ $quiz->finished_at }}">
                                    {{ $quiz->finished_at ? $quiz->finished_at->diffForHumans() : '-' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{route('quizzes.shower',$quiz->id)}}" class="btn btn-sm btn-secondary">
                                    <i class="fa fa-info-circle"></i>
                                </a>
                                <a href="{{ route('questions.index', $quiz->id) }}" class="btn btn-sm btn-warning"
                                    title="sorular"><i class="fas fa-question"></i></a>
                                <a href="{{ route('quizzes.edit', $quiz->id) }}" class="btn btn-sm btn-primary"
                                    title="düzenle"><i class="fas fa-pen"></i></a>
                                <a href="{{ route('quizzes.destroy', $quiz->id) }}" class="btn btn-sm btn-danger"
                                    title="sil"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $quizzes->withQueryString()->links() }}
        </div>
    </div>
</x-app-layout>
