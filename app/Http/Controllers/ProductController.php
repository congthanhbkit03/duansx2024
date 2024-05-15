<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\products;
use App\Models\category;
use DataTables;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $products = products::latest()->get();
            return DataTables::of($products)
                ->addIndexColumn()
                ->addColumn('action', function ($product) {
                    $btn = '
                        <a href="' . route('products.edit', $product->id) . '" 
                        class="btn btn-info"><i class="fas fa-eye"></i></a>
                        
                        <a href="' . route('products.edit', $product->id) . '" 
                        class="btn btn-warning"><i class="fas fa-pen"></i></a>
                        
                        <a href="' . route('products.delete', $product->id) . '" 
                        class="btn btn-danger"><i class="fas fa-trash"></i></a>
                    ';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('products.index');
    }

    public function add()
    {
        $category = category::get();

        return view('products.form', ['category' => $category]);
    }

    public function save(Request $request)
    {
        $data = [
            'item_code' => $request->item_code,
            'productname' => $request->productname,
            'category' => $request->id_category,
            'price' => $request->price
        ];

        products::create($data);

        return redirect()->route('products');
    }

    public function edit($id)
    {
        $product = products::find($id);
        $category = category::get();

        return view('products.form', ['product' => $product, 'category' => $category]);
    }

    public function update($id, Request $request)
    {
        $data = [
            'item_code' => $request->item_code,
            'productname' => $request->productname,
            'category' => $request->id_category,
            'price' => $request->price
        ];

        products::find($id)->update($data);

        return redirect()->route('products');
    }

    public function delete($id)
    {
        products::find($id)->delete();

        return redirect()->route('products');
    }
}