<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//panggil model LaguModel
use App\Models\PendengarModel;

class PendengarController extends Controller
{
    //method untuk tampil data pendengar
    public function pendengartampil()
    {
        $datapendengar = PendengarModel::orderby('id_pendengar', 'ASC')
        ->paginate(5);

        return view('halaman/view_pendengar',['pendengar'=>$datapendengar]);
    }

    //method untuk tambah data pendengar
    public function pendengartambah(Request $request)
    {
        $this->validate($request, [
            'nop' => 'required',
            'nama_pendengar' => 'required',
            'jenis_kelamin' => 'required',
            'hp' => 'required'
        ]);

        PendengarModel::create([
            'nop' => $request->nop,
            'nama_pendengar' => $request->nama_pendengar,
            'jenis_kelamin' => $request->jenis_kelamin,
            'hp' => $request->hp
        ]);

        return redirect('/pendengar');
    }

     //method untuk hapus data pendengar
     public function pendengarhapus($id_pendengar)
     {
         $datapendengar=PendengarModel::find($id_pendengar);
         $datapendengar->delete();
 
         return redirect()->back();
     }

     //method untuk edit data pendengar
    public function pendengaredit($id_pendengar, Request $request)
    {
        $this->validate($request, [
            'nop' => 'required',
            'nama_pendengar' => 'required',
            'jenis_kelamin' => 'required',
            'hp' => 'required'
        ]);

        $id_pendengar = PendengarModel::find($id_pendengar);
        $id_pendengar->nop   = $request->nop;
        $id_pendengar->nama_pendengar      = $request->nama_pendengar;
        $id_pendengar->prodi  = $request->jenis_kelamin;
        $id_pendengar->hp   = $request->hp;

        $id_pendengar->save();

        return redirect()->back();
    }
}