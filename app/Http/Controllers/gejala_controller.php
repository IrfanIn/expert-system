<?php

namespace App\Http\Controllers;

use App\Models\gejala;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as RoutingController;
use Illuminate\Support\Facades\Validator;

class gejala_controller extends RoutingController
{
    private $rules = [
        'gejala.*' => 'required',
    ];

    public function index()
    {
        $gejala = gejala::all();
        return view('pages.gejala.index', compact('gejala'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $cred = Validator::make($req->all(), $this->rules);

        if ($cred->fails())
            return back()->withErrors($cred->errors());

        foreach ($req->gejala as $key => $value)
            gejala::create([
                'gejala' => $value,
            ]);

        return back()->with('success', 'Berhasil input data');
    }

    /**
     * Display the specified resource.
     */
    public function show(gejala $gejala)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(gejala $gejala)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, gejala $gejala)
    {
        $input = $request->validate($this->rules);

        gejala::where('id', $request->id)->update($input);
        return back()->with('success', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(gejala $gejala, $id)
    {
        $gejala = gejala::find($id);
        if ($gejala->delete())
            return back()->with('success', 'Berhasil menghapus data');
        return back()->with('error', 'Server error');
    }
}
