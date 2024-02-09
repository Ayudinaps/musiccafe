@extends('index')
@section('title', 'Dj')

@section('isihalaman')
    <h3><center>Daftar Dj Music & Chill Cafe</center></h3>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDjTambah"> 
        Tambah Data Dj 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Dj</td>
                <td align="center">Nama Dj</td>
                <td align="center">HP</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($dj as $index=>$p)
                <tr>
                    <td align="center" scope="row">{{ $index + $dj->firstItem() }}</td>
                    <td>{{$p->id_dj}}</td>
                    <td>{{$p->nama_dj}}</td>
                    <td>{{$p->hp}}</td>
                    <td align="center">
                        
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalDjEdit{{$p->id_dj}}"> 
                            Edit
                        </button>
                         <!-- Awal Modal EDIT data dj -->
                        <div class="modal fade" id="modalDjEdit{{$p->id_dj}}" tabindex="-1" role="dialog" aria-labelledby="modalDjEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalDjEditLabel">Form Edit Data Dj</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formdjtaedit" id="formdjedit" action="/dj/edit/{{ $p->id_dj}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="form-group row">
                                                <label for="id_dj" class="col-sm-4 col-form-label">Nama Dj</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="nama_dj" name="nama_dj" placeholder="Masukkan Nama Dj">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="hp" class="col-sm-4 col-form-label">Hp</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="hp" name="hp" value="{{ $p->hp}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="petugastambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT data lagu -->
                        |
                        <a href="dj/hapus/{{$p->id_dj}}" onclick="return confirm('Yakin mau dihapus?')">
                            <button class="btn-danger">
                                Delete
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!--awal pagination-->
    Halaman : {{ $dj->currentPage() }} <br />
    Jumlah Data : {{ $dj->total() }} <br />
    Data Per Halaman : {{ $dj->perPage() }} <br />

    {{ $dj->links() }}
    <!--akhir pagination-->

    <!-- Awal Modal tambah data Dj -->
    <div class="modal fade" id="modalDjTambah" tabindex="-1" role="dialog" aria-labelledby="modalDjTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDjTambahLabel">Form Input Data Dj</h5>
                </div>
                <div class="modal-body">
                    <form name="formdjtambah" id="formdjtambah" action="/dj/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="id_dj" class="col-sm-4 col-form-label">Nama Dj</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama_dj" name="nama_dj" placeholder="Masukan Nama Dj">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="hp" class="col-sm-4 col-form-label">HP</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="hp" name="hp" placeholder="Masukan HP">
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="petugastambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah data lagu -->
    
@endsection