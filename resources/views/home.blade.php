@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Dashboard</div>

                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>

                                @endif
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                @can('user_management_access')
                                                   <a href="{{route('subject.create')}}" class="btn btn-dark shadow-lg">Create New Subjects</a>
                                                @endcan
                                            </div>
                                            <div class="col-md-6">
                                                <p class="btn btn-warning text-capitalize shadow-lg" >click On the subject you want to take survey on</p>
                                            </div>
                                        </div>


                                    </div>
                            </div>
                        </div>
                        <div class="card mt-4">
                            <div class="card-header font-weight-bold text-uppercase">Subjects</div>

                            <div class="card-body">
                                <ul class="list-group">
                                    @foreach($questions as $question)
                                        <li class="list-group-item">
                                            <a href="{{ $question->path()}}"><span class="text-dark text-capitalize font-weight-bold">{{ $question->name }}</span></a>

                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection