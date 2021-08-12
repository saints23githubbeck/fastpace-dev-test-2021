@extends('layouts.admin')
@section('content')
    <p><a href="{{ URL::previous() }}"><span class="btn btn-primary">Back</span></a></p>

    <div class="row">
        <p>Users Response On <span class="font-weight-bold text-capitalize mr-5">{{$question->question}}</span></p><br>
         @if($question->count > 0)
        <table class="table mt-5">
            <thead class="cta-bg-secondary text-center text-white">
            <tr class="bg-primary">
                <th scope="col">#</th>
                <th scope="col">User Name</th>
                <th scope="col">Answer</th>
                <th scope="col">Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($responses as $result)
                <tr class="text-center">
                    <td>{{$loop->iteration}}</td>
                    <td>{{ucfirst($result->survey->user->name)}}</td>
                    <td>{{ucfirst($result->answer->answer)}}</td>
                    <td>{{Carbon\Carbon::parse($result->created_at)->format('d-M-Y')}}</td>

                </tr>
            @endforeach
            </tbody>
        </table>
             @else

             <p class="text-danger">No response for this Question</p>

        @endif

</div>

    @endsection