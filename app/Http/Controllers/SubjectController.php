<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('subject.create');
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'purpose' => 'required',
        ]);
//        dd(auth()->user());
        $subject = auth()->user()->subjects()->create($data);

        return redirect('/subjects/'.$subject->id);
    }

    public function show(\App\Subject $subject)
    {
        $subject->load('questions.answers.responses');

        return view('subject.show', compact('subject'));
    }
}
