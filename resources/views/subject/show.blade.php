@extends('layouts.admin')
@section('content')
    <p><a href="{{ URL::previous() }}"><span class="btn btn-primary">Back</span></a></p>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><span class="mr-2 font-weight-bold text-capitalize">Subject :</span><span class="text-capitalize">{{ $subject->name }}</span></div>

                <div class="card-body">
                    @can('user_management_access')
                    <a class="btn btn-dark" href="/subjects/{{ $subject->id }}/questions/create">Add New Question</a>
                    @endcan
                    <a class="btn btn-dark" href="/surveys/{{ $subject->id }}-{{ Str::slug($subject->name) }}">Take Survey</a>
                </div>
            </div>

            @foreach($subject->questions as $question)
                <div class="card mt-4">

                    <div class="card-header"><span class="mr-2 font-weight-bold text-capitalize">Question :</span><a href=""><span class="text-capitalize">{{$question->question }}</span></a></div>

                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($question->answers as $answer)
                                <li class="list-group-item d-flex justify-content-between">
                                    <div class="text-capitalize">{{ $answer->answer }}</div>
                                    @if($question->responses->count())
                                        <div>{{ intval(($answer->responses->count() * 100) / $question->responses->count()) }}%</div>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="card-footer">
                        @can('user_management_access')


                            <p  class="btn btn-sm btn-outline-success"><a href="{{route('question.show.update.form',['question'=>$question->id])}}">Update Question</a></p>


                        @endcan
                            @can('user_management_access')
                                <form action="/subjects/{{ $subject->id }}/questions/{{ $question->id }}" method="post">
                                    @method('DELETE')
                                    @csrf

                                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete Question</button>

                                </form>
                            @endcan

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
