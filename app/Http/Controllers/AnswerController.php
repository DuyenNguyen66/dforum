<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Facades\JWTAuth;

class AnswerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.jwt')->only(['store', 'update', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $question = Question::find($id);
        return $question->answers()->with('user')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'question_id' => 'required|numeric',
            'user_id' => 'required|numeric',
            'body' => 'required'
        ]);
        $answer = new Answer();
        $answer->fill($request->all());
        $answer->save();

        return $answer;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        return $answer;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        $request->validate([
            'question_id' => 'required|numeric',
            'user_id' => 'required|numeric',
            'body' => 'required'
        ]);
        $answer->fill($request->all());
        $answer->save();

        return $answer;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        if ($answer->user->id == JWTAuth::user()->id) {
            $answer->delete();
            return response()->json(['message' => 'Your answer is deleted.']);
        } else {
            return response()->json(['message' => 'You have no permission.']);
        }
    }
}
