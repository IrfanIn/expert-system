<?php

namespace App\Http\Controllers;

use App\Models\analisa;
use App\Models\analisa_detail;
use App\Models\diagnosa;
use App\Models\gejala;
use App\Models\gejala_detail;
use App\Models\penyakit;
use App\Models\rule;
use App\Models\solusi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class WebController extends Controller
{
    public function landing(Request $req)
    {
        $data = gejala::all();
        return view('landing', compact('data'));
    }

    public function diagnosa(Request $req)
    {
        $username = $req->username;
        $diagnosa = gejala_detail::whereIn('gejala_id', $req->gejala)->get()->groupBy('penyakit_id');
        return view('landing', compact('diagnosa', 'username'));
    }

    public function result_store(Request $req)
    {
        $result = diagnosa::whereIn('rule_id', $req->id)->get()->groupBy('penyakit_id');

        $analisa = analisa::create(['username' => auth()->user()->username]);
        foreach ($result as $value) {
            $rule = rule::where('penyakit_id', $value[0]->penyakit->id)->count();
            $accuracy = $value->count() / $rule * 100 . ' ';
            analisa_detail::create([
                'analisa_id' => $analisa->id,
                'penyakit_id' => $value[0]->penyakit->id,
                'accuracy' => $accuracy,
            ]);
        }
        $data = analisa_detail::where('analisa_id', $analisa->id)->get();

        return view('pages.result', compact('data'));
    }

    public function result()
    {
        return view('pages.result');
    }

    public function dashboard()
    {
        $pakar = penyakit::all();
        return view('pages.pakar.index', compact('pakar'));
    }

    public function analisa()
    {
        $data = analisa::all()->sortByDesc('accuracy');
        return view('analisa', compact('data'));
    }

    public function store(Request $req)
    {
        // return $req;
        $cred = $req->validate([
            'penyakit' => 'required',
            'keterangan' => 'required',
            'gejala' => 'required',
            'solusi' => 'required',
            'rule' => 'required'
        ]);

        if (!$cred)
            return back();

        $penyakit = penyakit::create($cred);

        $cred['penyakit_id'] = $penyakit->id;

        foreach ($req->gejala as $value) {
            $gejala = gejala::create(['gejala' => $value]);
            $gejala_detail = gejala_detail::create([
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

        return back();
    }
}
