<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\Response;
use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class QuestionController extends Controller
{
    public function create(Subject $subject)
    {
        return view('question.create', compact('subject'));
    }

    public function store(Subject $subject)
    {
        $data = request()->validate([
            'question.question' => 'required',
            'answers.*.answer' => 'required',
        ]);

        $question = $subject->questions()->create($data['question']);
        $question->answers()->createMany($data['answers']);

        return redirect('/subjects/'.$subject->id);
    }

    public function destroy(Subject $subject, Question $question)
    {
        $question->answers()->delete();
        $question->delete();

        return redirect($subject->path());
    }

    public function responses(){
         $questions = Question::orderBy('created_at','desc')->get();
        return view('survey.showUserSurvey', compact('questions'));
    }


    public function surveyResult(Question $question){
        $responses = Response::select('survey_id','question_id','answer_id','created_at')->where('question_id',$question->id)
            ->orderBy('created_at','desc')
            ->groupBy('survey_id','question_id','answer_id','created_at')
            ->get();
//        dd($responses);
        return view('survey.response', compact('responses','question'));
    }

    public function showUpdateData(Question $question)
    {
        $questions = Question::with('answers')->where('id',$question->id)->get();
//        dd($question);
        return view('question.update', compact('questions'));
    }

    public function update(Question $question)
    {
        $data = request()->validate([
            'question.question' => 'required',
            'question.subject_id' => 'required',
        ]);
         $question->update($data['question']);


        return redirect()->back();
    }

}
