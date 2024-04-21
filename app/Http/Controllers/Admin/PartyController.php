<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Party;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PartyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.party.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.party.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'party_name' => 'required',
            'contact_person_name' => 'required',
            'contact_number' => 'required',
            'email_id' => 'required|email',
            'address' => 'required',
        ]);
        $parties = new Party();
        $parties->party_name = $request->party_name;
        $parties->contact_person_name = $request->contact_person_name;
        $parties->contact_number = $request->contact_number;
        $parties->email_id = $request->email_id;
        $parties->gst_number = $request->gst_number;
        $parties->address = $request->address;
        $parties->save();
        session()->flash('success_msg', "New Party  Added Successfully");
        return redirect(route('party.index'));

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
        $party = Party::find($id);
       return view('admin.party.edit', compact('party'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

            $request->validate([
                'party_name' => 'required',
                'contact_person_name' => 'required',
                'contact_number' => 'required',
                'email_id' => 'required|email',
                'address' => 'required',
            ]);

            $parties = Party::find($id);
            $parties->party_name = $request->party_name;
            $parties->contact_person_name = $request->contact_person_name;
            $parties->contact_number = $request->contact_number;
            $parties->email_id = $request->email_id;
            $parties->gst_number = $request->gst_number;
            $parties->address = $request->address;
            $parties->save();
            session()->flash('success_msg', "Successfully Updated Party");
            return redirect(route('party.index'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $party = Party::find($id);
        $party->delete();
        return response()->json(['success', 200]);
    }

    public function getData()
    {
        $query = Party::get();
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn("DT_RowIndex", '')
            ->addColumn('action', function ($datatables) {
                return '<a href="' . route('party.edit', $datatables->id) . '" class="btn btn-success waves-effect waves-light " title="Edit Detail"><i class="mdi mdi-pencil d-block font-size-16"></i></a>
                      <button onclick="deleteIt(' . $datatables->id . ')" class="btn btn-danger waves-effect waves-light "  title="Delete"><i class="mdi mdi-trash-can d-block font-size-16"></i></button>';
            })->make(true);
    }

}
