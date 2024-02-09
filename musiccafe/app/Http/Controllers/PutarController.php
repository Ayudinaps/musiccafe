<?php

namespace App\Http\Controllers;

// use App\Models\LaguModel;
// use App\Models\DjModel;
use Illuminate\Http\Request;

//memanggil model PutarModel
use App\Models\PutarModel;

//memanggil model DjModel
use App\Models\DjModel;

//memanggil model PendengarModel
use App\Models\PendengarModel;

//memanggil model LaguModel
use App\Models\LaguModel;

class PutarController extends Controller
{
    //method untuk tampil data pemutaran
    public function putartampil()
    {
        $dataputar = PutarModel::orderby('id_putar', 'ASC')
        ->paginate(5);

        $datadj        = DjModel::all();
        $datapendengar = PendengarModel::all();
        $datalagu      = LaguModel::all();

        return view('halaman/view_putar',['putar'=>$dataputar,'dj'=>$datadj,'pendengar'=>$datapendengar,'lagu'=>$datalagu]);
    }

    //method untuk tambah data pemutaran
    public function putartambah(Request $request)
    {
        $this->validate($request, [
            'id_dj' => 'required',
            'id_pendengar' => 'required',
            'id_lagu' => 'required'
        ]);

        PutarModel::create([
            'id_dj' => $request->id_dj,
            'id_pendengar' => $request->id_pendengar,
            'id_lagu' => $request->id_lagu
        ]);
        return redirect('/putar');
    }

    //method untuk hapus data pemutaran
    public function putarhapus($id_putar)
    {
        $dataputar=PutarModel::find($id_putar);
        $dataputar->delete();

        return redirect()->back();
    }

    //method untuk edit data pemutaran
    public function putaredit($id_putar, Request $request)
    {
        $this->validate($request, [
            'id_dj' => 'required',
            'id_pendengar' => 'required',
            'id_lagu' => 'required'
        ]);

        $id_putar = PutarModel::find($id_putar);
        $id_putar->id_dj    = $request->id_dj;
        $id_putar->id_pendengar      = $request->id_pendengar;
        $id_putar->id_lagu      = $request->id_lagu;

        $id_putar->save();

        return redirect()->back();
    }
}