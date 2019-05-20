<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Clearance;
use App\StudentProfile;

class StudentProfileController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StudentProfile  $studentProfile
     * @return \Illuminate\Http\Response
     */
    public function show(StudentProfile $studentProfile, Request $request)
    {
        $id = $request->get('id');
        $checked = Clearance::where('user_id', $id)->get()->all();
        $users = User::where('id', $id)->get('name');

        return view('studentprofile', compact('id', 'checked', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudentProfile  $studentProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentProfile $studentProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StudentProfile  $studentProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentProfile $studentProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudentProfile  $studentProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentProfile $studentProfile)
    {
        //
    }
}
