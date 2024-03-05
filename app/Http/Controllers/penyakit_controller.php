<?php

namespace App\Http\Controllers;

use App\Models\diagnosa;
use App\Models\gejala;
use App\Models\gejala_detail;
use App\Models\penyakit;
use App\Models\rule;
use App\Models\solusi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as RoutingController;
use Illuminate\Support\Facades\Validator;

class penyakit_controller extends RoutingController
{
    private $rules = [
        'penyakit' => 'required',
        'keterangan' => 'required',
        'gejala' => 'required',
        'solusi' => 'required',
        'rule' => 'required',
    ];

    public function index()
    {
        $pakar = penyakit::all();
        return view('pages.pakar.index', compact('pakar'));
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

        $data = $req->validate($this->rules);

        $penyakit = penyakit::create($data);

        $data['penyakit_id'] = $penyakit->id;

        foreach ($req->gejala as $value) {
            $gejala = gejala::create(['gejala' => $value]);
            gejala_detail::create([
                'gejala_id' => $gejala->id,
                'penyakit_id' => $penyakit->id,
            ]);
        }

        foreach ($req->solusi as $value)
            solusi::create([
                'penyakit_id' => $penyakit->id,
                'solusi' => $value,
            ]);

        foreach ($req->rule as $value) {
            $rule = rule::create([
                'penyakit_id' => $penyakit->id,
                'rule' => $value,
            ]);
            diagnosa::create([
                'rule_id' => $rule->id,
                'penyakit_id' => $penyakit->id,
            ]);
        }

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
        if ($penyakit->delete())
            return back()->with('success', 'Berhasil menghapus data');
        return back()->with('error', 'Server error');
    }
}
