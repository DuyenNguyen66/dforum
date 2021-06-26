<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Facades\JWTAuth;

class QuestionController extends Controller
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
    public function index()
    {
        $questions = Question::orderBy('created_at', 'desc')->with('user')->get();

        return $questions;
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
            'title' => 'required|between:20,255',
            'body' => 'required',
            'slug' => 'required',
            'user_id' => 'required|numeric',
        ]);

        $question = new Question();
        $question->fill($request->all());
        $question->save();

        return $question;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        return $question;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $request->validate([
            'title' => 'required|between:20,255',
            'body' => 'required',
            'slug' => 'required',
            'user_id' => 'required|numeric',
        ]);

        $question->fill($request->all());
        $question->save();

        return $question;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        if ($question->user->id == JWTAuth::user()->id) {
            $question->delete();
            return response()->json(['message' => 'Your question is deleted.']);
        } else {
            return response()->json(['message' => 'You have no permission.']);
        }
    }
}
