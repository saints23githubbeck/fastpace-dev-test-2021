<?php

namespace App\Http\Controllers\Admin;

use App\Subject;

class HomeController
{
    public function index(Subject $subject )
    {
        $questions= Subject::orderBy('created_at', 'desc')->get();
        $subject->load('questions.answers');
        return view('home',compact('questions','subject'));
    }
}
