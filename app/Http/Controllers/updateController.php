<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\User;
use App\Clearance;
use App\StudentProfile;

class updateController extends Controller  
{
    /**
     * Show the form for creating a new resource.
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $id = ($request->all())['user_id'];

        $clearances = Clearance::where('user_id', $id)->get();


        foreach ($clearances as $clearance) {

            if (count($request->all()) <= 2) {
                $clearance->is_cleared = false;
                $clearance->save();
            } else 
            {
                foreach ($request->all() as $key => $value) {
                    if ($key == '_token' || $key == 'user_id') {
                        continue;
                    }
                    $key = str_replace('_', ' ', $key);

                    $checked = Clearance::where('user_id', $id)->where('id', $key)->first();

                    if ($checked) {
                        $checked->is_cleared = true;
                        $checked->save();
                    }

                    if ($clearance->name != $key) {
                        $clearance->is_cleared = false;
                        $clearance->save();
                    }
                }
            }

        }
        ;
        $checked = Clearance::where('user_id', $id)->get()->all();
        $users = User::where('id', $id)->get('name');

        return view('studentprofile', compact('id', 'checked', 'users'));
    }
}

