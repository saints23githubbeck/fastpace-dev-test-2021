<?php

namespace App\Http\Controllers;

use App\Subject;
use App\User;
use Illuminate\Http\Request;

class ResponeseController extends Controller
{
    public function show(Subject $subject, $slug)
    {
        $subject->load('questions.answers');

        return view('survey.show', compact('subject'));
    }

    public function store()
    {
//        dd(request());
        $data = request()->validate([
            'responses.*.answer_id' => 'required',
            'responses.*.question_id' => 'required',
            'survey.comment' => 'required',
//            'survey.email' => 'required|email',
        ]);

        $survey = auth()->user()->surveys()->create($data['survey']);
        $survey->responses()->createMany($data['responses']);

//        auth()->user()->responses()->createMany($data);

        return redirect(route('home'))->with('status','Thank You for Response');


//        return 'Thank you!';
    }

}
