@extends('layouts.admin')
@section('content')
    <p><a href="{{ URL::previous() }}"><span class="btn btn-primary">Back</span></a></p>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h1>{{ $subject->name }}</h1>

            <form action="/surveys/{{ $subject->id }}-{{ Str::slug($subject->name) }}" method="post">
                @csrf

                @foreach($subject->questions as $key => $question)
                    <div class="card mt-4">
                        <div class="card-header"><strong>{{ $key + 1 }}</strong> {{ $question->question }}</div>

                        <div class="card-body">

                            @error('responses.' . $key . '.answer_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                            <ul class="list-group">
                                @foreach($question->answers as $answer)
                                    <label for="answer{{ $answer->id }}">
                                        <li class="list-group-item">
                                            <input type="radio" name="responses[{{ $key }}][answer_id]" id="answer{{ $answer->id }}"
                                                   {{ (old('responses.' . $key . '.answer_id') == $answer->id) ? 'checked' : '' }}
                                                   class="mr-2" value="{{ $answer->id }}">
                                            {{ $answer->answer }}

                                            <input type="hidden" name="responses[{{ $key }}][question_id]" value="{{ $question->id }}">
                                        </li>
                                    </label>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach

                <div class="card mt-4">
                    <div class="card-header">Your Information</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Your Comments</label>
                            <input name="survey[comment]" type="text" class="form-control" id="comment" aria-describedby="nameHelp" placeholder="Enter Your Comments Here">
                            <small id="nameHelp" class="form-text text-muted">Hello! Your Comments Here?</small>

                            @error('comment')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div>
                            <button class="btn btn-dark" type="submit">Complete Survey</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
