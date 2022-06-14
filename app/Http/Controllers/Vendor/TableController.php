<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use App\Models\VendorTable;
use App\Http\Controllers\Controller;
use App\Models\Vendor;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.vendor.add_table');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vendor = Vendor::where('user_id',auth()->user()->id)->first();
        $table = VendorTable::create([
            "name" => $request->name,
            "capacity" => $request->capacity,
            'vendor_id' => $vendor->id
        ]);
        return redirect('/vendor/tables');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $table = VendorTable::find($id);
        return view('vendor.vendor.edit_table', compact('table'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $table = VendorTable::find($id);
        $table->name = $request->name;
        $table->capacity = $request->capacity;
        $table->save();
        return redirect('/vendor/tables');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
