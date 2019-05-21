<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Clearance;
use App\StudentProfile;

class StudentProfileController extends Controller
{

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

}
