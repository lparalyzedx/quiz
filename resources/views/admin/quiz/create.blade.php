<x-app-layout>
    <x-slot name="header">
        Quiz Oluştur
    </x-slot>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('quizzes.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Quiz Başlık</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                </div>
                <br>
                <div class="form-group">
                    <label>Quiz Açıklama</label>
                    <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                </div>
                <br>
                <div class="form-group">
                    <label>Quiz Durumu</label>
                    <select name="status" class="form-control">
                        <option value="publish">Aktif</option>
                        <option value="draft">Taslak</option>
                        <option value="passive">Pasif</option>
                    </select>
                </div>
                <br>
                Bitiş Tarihi olacak mı?&nbsp; <input type="checkbox" {{ old('finished_at') ? 'checked' : '' }}
                    id="check"><br>

                <div class="form-group {{ old('finished_at') ? 'd-block' : '' }}" style="display: none" id="date">
                    <br>
                    <label>Bitiş Tarihi</label>
                    <input type="datetime-local" name="finished_at" class="form-control"
                        value="{{ old('finished_at') }}">
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-sm w-100 py-1 btn-block"> Quiz Oluştur</button>
                </div>
            </form>
        </div>
    </div>


</x-app-layout>

<script>
    let datetime = document.querySelector('#date');
    let check = document.querySelector('#check');
    if (check) {
        check.addEventListener('click', function() {
            datetime.classList.toggle('d-block');
        })
    }
</script>
