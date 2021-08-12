@extends('layouts.admin')
@section('content')
    <p><a href="{{ URL::previous() }}"><span class="btn btn-primary">Back</span></a></p>
    <div class="row">
        <p>All Questions</p>
        <table class="table mt-5">
            <thead class=" text-center text-white">
            <tr class="bg-primary">
                <th scope="col">#</th>
                <th scope="col">Subjects</th>
                <th scope="col">Questions</th>
                <th scope="col">Date</th>
            </tr>
            </thead>
            <tbody>

            @foreach($questions as $question)
                <tr class="text-center">
                    <td>{{$loop->iteration}}</td>
                    <td>{{ucfirst($question->subject->name)}}</td>
                    <td><a href="{{route('questions.all',['question'=>$question])}}" style="text-decoration: none">{{ucfirst($question->question)}}</a></td>
                    <td>{{Carbon\Carbon::parse($question->created_at)->format('d-M-Y')}}</td>

                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

@endsection