<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//panggil model LaguModel
use App\Models\LaguModel;

class LaguController extends Controller
{
    //method untuk tampil data lagu
    public function lagutampil()
    {
        $datalagu = LaguModel::orderby('kode_lagu', 'ASC')
        ->paginate(5);

        return view('halaman/view_lagu',['lagu'=>$datalagu]);
    }

    //method untuk tambah data lagu
    public function lagutambah(Request $request)
    {
        $this->validate($request, [
            'kode_lagu' => 'required',
            'judul' => 'required',
            'penyanyi' => 'required',
            'kategori' => 'required'
        ]);

        LaguModel::create([
            'kode_lagu' => $request->kode_lagu,
            'judul' => $request->judul,
            'penyanyi' => $request->penyanyi,
            'kategori' => $request->kategori
        ]);

        return redirect('/lagu');
    }

     //method untuk hapus data lagu
     public function laguhapus($id_lagu)
     {
         $datalagu=LaguModel::find($id_lagu);
         $datalagu->delete();
 
         return redirect()->back();
     }

     //method untuk edit data lagu
    public function laguedit($id_lagu, Request $request)
    {
        $this->validate($request, [
            'kode_lagu' => 'required',
            'judul' => 'required',
            'penyanyi' => 'required',
            'kategori' => 'required'
        ]);

        $id_lagu = LaguModel::find($id_lagu);
        $id_lagu->kode_lagu   = $request->kode_lagu;
        $id_lagu->judul      = $request->judul;
        $id_lagu->penyanyi  = $request->penyanyi;
        $id_lagu->kategori   = $request->kategori;

        $id_lagu->save();

        return redirect()->back();
    }
}