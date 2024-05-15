<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

use DataTables;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $orders = Order::latest()->get();

            if ($request->filled('start_date') && $request->filled('end_date')) {
                $orders = $orders->whereBetween('created_at', [$request->start_date, $request->end_date]);
            }
            return DataTables::of($orders)
                ->addIndexColumn()
                ->addColumn('action', function ($user) {
                    $btn = '
                        <a href="#" 
                        class="btn btn-info"><i class="fas fa-eye"></i></a>
                        
                        <a href="#" 
                        class="btn btn-warning"><i class="fas fa-pen"></i></a>
                        
                        <a href="#" 
                        class="btn btn-danger"><i class="fas fa-trash"></i></a>
                    ';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('orders.index');
    }

    // public function add()
    // {
    //     $users = User::get();

    //     return view('users.form', ['category' => $users]);
    // }

    // public function save(Request $request)
    // {
    //     $data = [
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => $request->password,
    //         'level' => $request->level
    //     ];

    //     User::create($data);

    //     return redirect()->route('users');
    // }

    // public function edit($id)
    // {
    //     $user = User::find($id);

    //     return view('users.form', ['user' => $user]);
    // }

    // public function update($id, Request $request)
    // {
    //     $data = [
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => $request->password,
    //         'level' => $request->level
    //     ];

    //     User::find($id)->update($data);

    //     return redirect()->route('users');
    // }

    // public function delete($id)
    // {
    //     User::find($id)->delete();

    //     return redirect()->route('users');
    // }
}