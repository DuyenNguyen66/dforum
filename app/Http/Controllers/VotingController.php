<?php

namespace App\Http\Controllers;

use App\Voting;
use Illuminate\Http\Request;

class VotingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function voting(Request $request)
    {
        $request->validate([
            'user_id' => 'required|numeric',
            'vote_type' => 'required|numeric',
            'object_id' => 'required|numeric',
            'vote' => 'required|numeric'
        ]);
        $vote = new Voting();
        $vote->fill($request->all());
        $vote->save();

        return $vote;
    }
}
