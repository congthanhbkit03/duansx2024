<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Congdoan;

class congdoanController extends Controller
{
    public function index()
    {
        $congdoans = Congdoan::get();

        return view('congdoan/index', ['congdoans' => $congdoans]);
    }

    public function add()
    {
        return view('congdoan.form');
    }

    public function save(Request $request)
    {
        Congdoan::create(['tencongdoan' => $request->tencongdoan]);

        return redirect()->route('congdoan');
    }

    public function edit($id)
    {
        $congdoan = Congdoan::find($id);
        //echo "$congdoan";
        return view('congdoan.form', ['congdoan' => $congdoan]);
    }

    public function update($id, Request $request)
    {
        Congdoan::find($id)->update(['tencongdoan' => $request->tencongdoan]);

        return redirect()->route('congdoan');
    }

    public function delete($id)
    {
        Congdoan::destroy($id);
        return redirect()->route('congdoan');
    }
}
