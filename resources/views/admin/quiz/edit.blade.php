<x-app-layout>
    <x-slot name="header">
        Quiz Güncelle
    </x-slot>
    
    <div class="card">
        <div class="card-body">
        <form action="{{route('quizzes.update',$quiz->id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label>Quiz Başlık</label>
            <input type="text" name="title" class="form-control" value="{{$quiz->title}}" >
        </div>
        <br>
        <div class="form-group">
            <label>Quiz Açıklama</label>
            <textarea name="description" class="form-control" rows="4">{{$quiz->description}}</textarea>
        </div>
        <br>
        Bitiş Tarihi olacak mı?&nbsp; <input type="checkbox" {{$quiz->finished_at ? 'checked' : ''}}  id="check"><br>

        <div class="form-group {{$quiz->finished_at ? 'd-block' : ''}}" style="display: none" id="date">
            <br>
            <label>Bitiş Tarihi</label>
            <input type="datetime-local" name="finished_at" class="form-control" @if($quiz->finished_at) value="{{date('Y-m-d\Th:i',strtotime($quiz->finished_at))}}" @endif>
        </div>
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-success btn-sm w-100 py-1 btn-block"> Quiz Oluştur</button>
        </div>
       </form>
       </div>
    </div>
      

</x-app-layout>

<script>
    let datetime= document.querySelector('#date');
    let check= document.querySelector('#check');
    if(check){
      check.addEventListener('click',function(){
         datetime.classList.toggle('d-block');
      })
    }
  </script>