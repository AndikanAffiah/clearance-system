<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clearance;

class CheckController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request)
    {            
        foreach ($request->user()->clearances as $clearance) {
            
            if(count($request->all()) == 1){
                $clearance->is_submitted = false;
                $clearance->save();
            }else{
                foreach ($request->all() as $key => $value) {
                    if ($key == '_token') {
                        continue;
                    }
                    $key = str_replace('_', ' ', $key);
                    
                    $checked = Clearance::where('user_id', $request->user()->id)->where('name', $key)->first();
    
                    if ($checked) {
                        $checked->is_submitted = true;
                        $checked->save();
                    }
    
                    if ($clearance->name != $key) {
                        $clearance->is_submitted = false;
                        $clearance->save();
                    }
                }
            }


        }
        return redirect()->back();
    }
}
