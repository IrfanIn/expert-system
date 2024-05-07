<?php

namespace App\Http\Controllers;

use App\Models\analisa;
use App\Models\analisa_detail;
use App\Models\diagnosa;
use App\Models\gejala;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class analisa_controller extends Controller
{
    public function analisa()
    {
        $data = analisa::all()->sortByDesc('accuracy');
        $gejala = gejala::all();
        return view('analisa', compact('data', 'gejala'));
    }

    public function analisa_store(Request $req)
    {
        $diagnosa = diagnosa::whereIn('gejala_id', $req->id)->get()->groupBy('penyakit_id');
        $analisa = analisa::create(['username' => auth()->user()->username]);

        foreach ($diagnosa as $item) {
            $cf = 0;
            foreach ($item as $key => $value) {
                if (count($item) == 1)
                    $cf = $value->hipotesa;
                elseif ($key == 0)
                    $cf = $value->hipotesa + ($diagnosa[$value->penyakit_id][$key + 1]->hipotesa * ($req->hipotesa[$key] - $value->hipotesa));
                elseif ($key != 0)
                    $cf = $cf + ($diagnosa[$value->penyakit_id][$key]->hipotesa * ($req->hipotesa[$key] - $cf));
            }
            analisa_detail::create([
                'analisa_id' => $analisa->id,
                'penyakit_id' => $value->penyakit_id,
                'accuracy' => $cf,
            ]);
        }

        return back()->with('success', 'Analisa penyakit berhasil');
    }
}
