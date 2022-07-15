<x-app-layout>
    <x-slot name='header'>{{ $quiz->title }} Soruları</x-slot>

    <div class="card">
        <div class="card-body">
            <p class="card-text py-2">

                <form action="#">
                    @foreach ($quiz->questions as $question)
                    <strong class="mb-4">#{{ $loop->iteration }} {{ $question->question }}</strong>

                    @if($question->image)
                    <img src="{{asset($question->image)}}"  style="width: 50%; margin:5px 0;" alt="">
                    @endif
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{ $question->id }}"
                            id="quiz{{ $question->id }}1" required>
                        <label class="form-check-label" for="quiz{{ $question->id }}1">
                            {{ $question->answer1 }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{ $question->id }}"
                            id="quiz{{ $question->id }}2" required>
                        <label class="form-check-label" for="quiz{{ $question->id }}2">
                            {{ $question->answer2 }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{ $question->id }}"
                            id="quiz{{ $question->id }}3" required>
                        <label class="form-check-label" for="quiz{{ $question->id }}3">
                            {{ $question->answer3 }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{ $question->id }}"
                            id="quiz{{ $question->id }}4" required>
                        <label class="form-check-label" for="quiz{{ $question->id }}4">
                            {{ $question->answer4 }}
                        </label>
                    </div>
                        <hr>
                @endforeach
                <button type="submit" class="btn btn-block btn-primary" style="width: 100%">Sınavı Bitir</button>
                </form>
            </p>
        </div>
    </div>
</x-app-layout>
