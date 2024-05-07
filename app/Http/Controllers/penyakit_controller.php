<?php

namespace App\Http\Controllers;

use App\Models\diagnosa;
use App\Models\gejala;
use App\Models\penyakit;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as RoutingController;
use Illuminate\Support\Facades\Validator;

class penyakit_controller extends RoutingController
{
    private $rules = [
        'penyakit' => 'required',
        'gejala_id' => 'required',
        'hipotesa' => 'required',
    ];

    public function index()
    {
        return view('pages.pakar.index', [
            'pakar' => penyakit::all(),
            'gejala' => gejala::all(),
        ]);
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
            return back()->withErrors($cred->errors())->withInput();

        $data = $req->validate($this->rules);

        $penyakit = penyakit::create($data);

        foreach ($req->gejala_id as $key => $value)
            diagnosa::create([
                'gejala_id' => $value,
                'penyakit_id' => $penyakit->id,
                'hipotesa' => $req->hipotesa[$key]
            ]);


        return back()->with('success', 'Berhasil input data');
    }

    /**
     * Display the specified resource.
     */
    public function show(penyakit $penyakit)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(penyakit $penyakit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, penyakit $penyakit)
    {
        $input = $request->validate($this->rules);

        penyakit::where('id', $request->id)->update($input);
        return back()->with('success', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(penyakit $penyakit, $id)
    {
        $penyakit = penyakit::find($id);
        diagnosa::where('penyakit_id', $penyakit->id)->delete();
        if ($penyakit->delete())
            return back()->with('success', 'Berhasil menghapus data');
        return back()->with('error', 'Server error');
    }
}
