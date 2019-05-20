<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clearance;

class ClearanceController extends Controller
{
    public function create()
    {
        return view();
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = $request->user()->id;
        if ($request->has('is_submitted')) {
            if ($request->is_submitted == 'on') {
                $data['is_submitted'] = true;
            } else {
                $data['is_submitted'] = false;
            }
        }

        Clearance::create($data);

        return redirect()->route('dashboard');
    }
}
