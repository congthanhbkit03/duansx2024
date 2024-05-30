<?php

namespace App\Http\Controllers;

use App\Models\Cauhinh;
use Illuminate\Http\Request;

class CauhinhController extends Controller
{
    //dung cho ben ngoai su dung
    public function getValueByKey($key)
    {
        $result = Cauhinh::where('key', $key)->first();

        return response()->json($result);
    }

    public function add()
    {
        return view('cauhinhs.form');
    }



    public function getBu()
    {
        $cauhinh = Cauhinh::where('key', 'bu')->first();

        return view('cauhinhs.bu.form', ['cauhinh' => $cauhinh]);
    }


    public function saveBu(Request $request)
    {
        // $bu = Cauhinh::where('key', $request->key)->first();
        $bu = Cauhinh::where('id', 1);  //xac dinh cac cau hinh theo id
        $data = ['value' => $request->value];
        $bu->update($data);

        // $bu->save();
        // category::create(['name' => $request->name]);

        return redirect()->route('cauhinhs.form.bu');
    }

}
