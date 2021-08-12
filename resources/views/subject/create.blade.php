@extends('layouts.admin')
@section('content')
    <p><a href="{{ URL::previous() }}"><span class="btn btn-primary">Back</span></a></p>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Subject</div>

                <div class="card-body">
                    <form action="{{route('subject.store')}}" method="post">

                        @csrf

                        <div class="form-group">
                            <label for="name">Subject Name</label>
                            <input name="name" type="text" class="form-control" id="name" aria-describedby="titleHelp" placeholder="Enter subject name">
                            <small id="titleHelp" class="form-text text-muted">Give your Subject a title that attracts attention.</small>

                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="purpose">Purpose</label>
                            <input name="purpose" type="text" class="form-control" id="purpose" aria-describedby="purposeHelp" placeholder="Enter Purpose">
                            <small id="purposeHelp" class="form-text text-muted">Giving a purpose will increase responses.</small>

                            @error('purpose')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Create Question</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
