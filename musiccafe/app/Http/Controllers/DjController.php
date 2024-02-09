<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//panggil model Petugas
use App\Models\DjModel;

class DjController extends Controller
{
    //method untuk tampil data dj
    public function djtampil()
    {
        $datadj = DjModel::orderby('id_dj', 'ASC')
        ->paginate(5);

        return view('halaman/view_dj',['dj'=>$datadj]);
    }

    //method untuk tambah data dj
    public function djtambah(Request $request)
    {
        $this->validate($request, [
            'nama_dj' => 'required',
            'hp' => 'required'
        ]);

        DjModel::create([
            'nama_dj' => $request->nama_dj,
            'hp' => $request->hp
        ]);

        return redirect('/dj');
    }

     //method untuk hapus data dj
     public function djhapus($id_dj)
     {
         $datadj=DjModel::find($id_dj);
         $datadj->delete();
 
         return redirect()->back();
     }

     //method untuk edit data dj
    public function djedit($id_dj, Request $request)
    {
        $this->validate($request, [
            'nama_dj' => 'required',
            'hp' => 'required'
        ]);

        $id_dj = DjModel::find($id_dj);
        $id_dj->nama_dj      = $request->nama_dj;
        $id_dj->hp   = $request->hp;

        $id_dj->save();

        return redirect()->back();
    }
}