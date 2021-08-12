@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update Question</div>
                    @foreach($questions as $question)
                    <div class="card-body">
                        <form action="{{route('question.update',['question'=>$question->id])}}" method="PATCH">

                            @csrf

                            <div class="form-group">
                                <label for="question">Question</label>
                                <input name="question[question]" type="text" class="form-control"
                                       value="{{$question->question }} "
                                       id="question" aria-describedby="questionHelp" placeholder="Enter Question">
                                <small id="questionHelp" class="form-text text-muted">Ask simple questions for best results.</small>

                                @error('question.question')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <input name="question[subject_id]" type="hidden" class="form-control"
                                   value="{{$question->subject_id }} "
                                   id="question" aria-describedby="questionHelp" placeholder="Enter Question">

                                @endforeach
                            <button type="submit" class="btn btn-primary">Update Question</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
