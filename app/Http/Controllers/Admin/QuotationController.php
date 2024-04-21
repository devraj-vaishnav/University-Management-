<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Party;
use App\Models\Product;
use App\Models\Quotation;
use App\Models\QuotationProduct;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use function Termwind\renderUsing;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.quotation.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parties = Party::pluck('party_name', 'id')->toArray();
        $products = Product::pluck('name', 'id')->toArray();
        return view('admin.quotation.create', compact('parties', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'quotation_no' => 'required',
            'quotation_date' => 'required',
            'party_id' => 'required',
            'quotation_des' => 'required',
            'qty' => 'required',
            'rate' => 'required',
            'amount' => 'required',
        ]);

        $quotation_des = $request->quotation_des;
        $qty = $request->qty;
        $rate = $request->rate;
        $amount = $request->amount;
        $productId = $request->product_id;

        $quotations = new Quotation;
        $quotations->quotation_no = $request->quotation_no;
        $quotations->quotation_date = $request->quotation_date;
        $quotations->party_id = $request->party_id;
        $quotations->ship_person_name = $request->ship_person_name;
        $quotations->ship_person_contact = $request->ship_person_contact;
        $quotations->ship_address = $request->ship_address;
        $quotations->save();

        foreach ($quotation_des as $key => $value) {
            $quotationProducts = new QuotationProduct;
            $quotationProducts->quotation_id = $quotations->id;
            $quotationProducts->product_id = $productId[$key];
            $quotationProducts->quotation_des = $quotation_des[$key];
            $quotationProducts->qty = $qty[$key];
            $quotationProducts->rate = $rate[$key];
            $quotationProducts->amount = $amount[$key];
            $quotationProducts->save();
        }

        session()->flash('success_msg', "New Quotation Added Successfully");
        return redirect(route('quotation.index'));

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $quotation = Quotation::find($id);
        $allQutProducts = QuotationProduct::where('quotation_id', $quotation->id)->join('products', 'products.id', 'quotation_products.product_id')
            ->select('quotation_products.*', 'products.name')->get();
//        dd($allData);
        return view('admin.quotation.show', compact('quotation', 'allQutProducts'));
    }


    /**
     * Show the form for editing the specified resource.
     */
//    public function edit(string $id)
//    {
//        $quotation = Quotation::find($id);
//        $quotationProducts = QuotationProduct::where('quotation_id', $id)->get();
//        dd($quotationProducts, $quotation);
////        $parties = Party::pluck('party_name', 'id')->toArray();
////        $products = Product::pluck('name', 'id')->toArray();
//        return view('admin.quotation.edit', compact('quotation','quotationProducts'));
//    }
    public function edit(string $id)
    {
        $quotation = Quotation::find($id);
        $quotationProducts = QuotationProduct::where('quotation_id', $id)->get();
        $parties = Party::pluck('party_name', 'id')->toArray();
        $products = Product::pluck('name', 'id')->toArray();
        return view('admin.quotation.edit', compact('quotation', 'quotationProducts', 'products', 'parties'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'quotation_no' => 'required',
            'quotation_date' => 'required',
            'party_id' => 'required',
            'quotation_des' => 'required',
            'qty' => 'required',
            'rate' => 'required',
            'amount' => 'required',
        ]);


        $quotation = Quotation::find($id);
        $quotation->quotation_no = $request->quotation_no;
        $quotation->quotation_date = $request->quotation_date;
        $quotation->party_id = $request->party_id;
        $quotation->ship_person_name = $request->ship_person_name;
        $quotation->ship_person_contact = $request->ship_person_contact;
        $quotation->ship_address = $request->ship_address;
        $quotation->save();

        $quotation_des = $request->quotation_des;
        $qty = $request->qty;
        $rate = $request->rate;
        $amount = $request->amount;
        $productId = $request->product_id;
        $check_value = $request->check_value;

        foreach ($check_value as $key => $value) {
            if ($check_value[$key] == 'new') {
                $quotationProducts = new QuotationProduct;
                $quotationProducts->quotation_id = $quotation->id;
            } else {
                $quotationProducts = QuotationProduct::find($check_value[$key]);
            }
            $quotationProducts->product_id = $productId[$key];
            $quotationProducts->quotation_des = $quotation_des[$key];
            $quotationProducts->qty = $qty[$key];
            $quotationProducts->rate = $rate[$key];
            $quotationProducts->amount = $amount[$key];
            $quotationProducts->save();
        }
        session()->flash('success_msg', "Successfully Updated Quotation");
        return redirect(route('quotation.index'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $quotation = Quotation::find($id);
        $quotation->delete();
        return response()->json(['success', 200]);

    }

    public function delete(string $id)
    {

        $quotationProduct = QuotationProduct::find($id);
        $quotationProduct->delete();
         return redirect('admin.quotation.show');
    }

    public function getData()
    {
        $query = Quotation::join('parties', 'parties.id', 'quotations.party_id')
            ->select('quotations.*', 'parties.party_name')->get();
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn("DT_RowIndex", '')
            ->addColumn('action', function ($datatables) {
                return '<a href="' . route('quotation.edit', $datatables->id) . '" class="btn btn-success waves-effect waves-light " title="Edit Detail"><i class="mdi mdi-pencil d-block font-size-16"></i></a>
<a href="' . route('quotation.show', $datatables->id) . '" class="btn btn-warning waves-effect waves-light " title="Edit Detail"><i class="dripicons-forward d-block font-size-16"></i></a>
                      <button onclick="deleteIt(' . $datatables->id . ')" class="btn btn-danger waves-effect waves-light "  title="Delete"><i class="mdi mdi-trash-can d-block font-size-16"></i></button>';
            })->make(true);
    }

//    public function productData()
//    {
//        $quotation = Quotation::all();
//        $query = QuotationProduct::join('products', 'products.id', 'quotation_products.product_id')
//            ->select('quotation_products.*', 'products.name')->where('quotation_products.quotation_id',$quotation->id)->get();
//
//        return DataTables::of($query)
//            ->addIndexColumn()
//            ->addColumn("DT_RowIndex", '')
//            ->addColumn('action', function ($datatables) {
//                return '<button onclick="deleteIt(' . $datatables->id . ')" class="btn btn-danger waves-effect waves-light "  title="Delete"><i class="mdi mdi-trash-can d-block font-size-16"></i></button>';
//            })->make(true);
//    }

//    public function productData()
//    {
//        $quotations = Quotation::all();
//        $query = QuotationProduct::where('quotation_id', $quotations->id)
//            ->join('products', 'products.id', 'quotation_products.product_id')
//            ->select('quotation_products.*', 'products.name')
//            ->get();
//
//        return DataTables::of($query)
//            ->addIndexColumn()
//            ->addColumn('DT_RowIndex', '')
//            ->addColumn('action', function ($quotationProduct) {
//                return '<button onclick="deleteIt(' . $quotationProduct->id . ')" class="btn btn-danger waves-effect waves-light" title="Delete"><i class="mdi mdi-trash-can d-block font-size-16"></i></button>';
//            })
//            ->rawColumns(['action'])
//            ->make(true);
//    }

}

