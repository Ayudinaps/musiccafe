@extends('index')
@section('title', 'Pendengar')

@section('isihalaman')
    <h3><center>Daftar Pendengar yang merequest lagu di Music & Chill Cafe</center></h3>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPendengarTambah"> 
        Tambah Data Pendengar 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Pendengar</td>
                <td align="center">NOP</td>
                <td align="center">Nama Pendengar</td>
                <td align="center">Jenis Kelamin</td>
                <td align="center">HP</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($pendengar as $index=>$a)
                <tr>
                    <td align="center" scope="row">{{ $index + $pendengar->firstItem() }}</td>
                    <td>{{$a->id_pendengar}}</td>
                    <td>{{$a->nop}}</td>
                    <td>{{$a->nama_pendengar}}</td>
                    <td>{{$a->jenis_kelamin}}</td>
                    <td>{{$a->hp}}</td>
                    <td align="center">
                        
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalPendengarEdit{{$a->id_pendengar}}"> 
                            Edit
                        </button>
                         <!-- Awal Modal EDIT data Pendengar -->
                        <div class="modal fade" id="modalPendengarEdit{{$a->id_pendengar}}" tabindex="-1" role="dialog" aria-labelledby="modalPendengarEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalPendengarEditLabel">Form Edit Data Pendengar</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formpendengaredit" id="formpendengaredit" action="/pendengar/edit/{{ $a->id_pendengar}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="form-group row">
                                                <label for="id_pendengar" class="col-sm-4 col-form-label">nop</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="nop" name="nop" placeholder="Masukan NOP">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="nama_pendengar" class="col-sm-4 col-form-label">Nama Pendengar</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="nama_pendengar" name="nama_pendengar" value="{{ $a->nama_pendengar}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="jenis_kelamin" class="col-sm-4 col-form-label">Jenis kelamin</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="{{ $a->jenis_kelamin}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="hp" class="col-sm-4 col-form-label">Hp</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="hp" name="hp" value="{{ $a->hp}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="anggotatambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT data lagu -->
                        |
                        <a href="pendengar/hapus/{{$a->id_pendengar}}" onclick="return confirm('Yakin mau dihapus?')">
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
    Halaman : {{ $pendengar->currentPage() }} <br />
    Jumlah Data : {{ $pendengar->total() }} <br />
    Data Per Halaman : {{ $pendengar->perPage() }} <br />

    {{ $pendengar->links() }}
    <!--akhir pagination-->

    <!-- Awal Modal tambah data pendengar -->
    <div class="modal fade" id="modalPendengarTambah" tabindex="-1" role="dialog" aria-labelledby="modalPendengarTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPendengarTambahLabel">Form Input Data Pendengar</h5>
                </div>
                <div class="modal-body">
                    <form name="formpendengartambah" id="formpendengartambah" action="/pendengar/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="id_pendengar" class="col-sm-4 col-form-label">NOP</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nop" name="nop" placeholder="Masukan NOP">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="nama_pendengar" class="col-sm-4 col-form-label">Nama Pendengar</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama_pendengar" name="nama_pendengar" placeholder="Masukan Nama Pendengar">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="jenis_kelamin" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" placeholder="Masukan Jenis Kelamin">
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
                            <button type="submit" name="anggotatambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah data lagu -->
    
@endsection