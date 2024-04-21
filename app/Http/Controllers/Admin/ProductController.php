<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'hsn_code' => 'required',
            'buying_price' => 'required',
            'selling_price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
        ]);
        $products = new Product();
        $products->name = $request->name;
        $products->code = $request->code;
        $products->hsn_code = $request->hsn_code;
        $products->buying_price = $request->buying_price;
        $products->selling_price = $request->selling_price;
        $products->quantity = $request->quantity;
        $products->description = $request->description;
        $products->save();
        session()->flash('success_msg', "New Product Added Successfully");
        return redirect(route('product.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        return view('admin.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'hsn_code' => 'required',
            'buying_price' => 'required',
            'selling_price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
        ]);

        $product = Product::find($id);
        $product->name = $request->name;
        $product->code = $request->code;
        $product->hsn_code = $request->hsn_code;
        $product->buying_price = $request->buying_price;
        $product->selling_price = $request->selling_price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->save();
        session()->flash('success_msg', "Successfully Updated Product");
        return redirect(route('product.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        return response()->json(['success', 200]);
    }

    public function getData()
    {
        $query = Product::get();
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn("DT_RowIndex", '')
            ->addColumn('action', function ($datatables) {
                return '<a href="' . route('product.edit', $datatables->id) . '" class="btn btn-success waves-effect waves-light " title="Edit Detail"><i class="mdi mdi-pencil d-block font-size-16"></i></a>
                      <button onclick="deleteIt(' . $datatables->id . ')" class="btn btn-danger waves-effect waves-light "  title="Delete"><i class="mdi mdi-trash-can d-block font-size-16"></i></button>';
            })->make(true);
    }
}
