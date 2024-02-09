@extends('index')
@section('title', 'Lagu')

@section('isihalaman')
    <h3><center>Daftar Lagu di Music & Chill Cafe</center></h3>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalLaguTambah"> 
        Tambah Data Lagu 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Lagu</td>
                <td align="center">Kode Lagu</td>
                <td align="center">Judul Lagu</td>
                <td align="center">Penyanyi</td>
                <td align="center">Kategori</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($lagu as $index=>$bk)
                <tr>
                    <td align="center" scope="row">{{ $index + $lagu->firstItem() }}</td>
                    <td>{{$bk->id_lagu}}</td>
                    <td>{{$bk->kode_lagu}}</td>
                    <td>{{$bk->judul}}</td>
                    <td>{{$bk->penyanyi}}</td>
                    <td>{{$bk->kategori}}</td>
                    <td align="center">
                        
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalLaguEdit{{$bk->id_lagu}}"> 
                            Edit
                        </button>
                         <!-- Awal Modal EDIT data Lagu -->
                        <div class="modal fade" id="modalLaguEdit{{$bk->id_lagu}}" tabindex="-1" role="dialog" aria-labelledby="modalLaguEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLaguEditLabel">Form Edit Data Lagu</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formlaguedit" id="formlaguedit" action="/lagu/edit/{{ $bk->id_lagu}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="form-group row">
                                                <label for="id_lagu" class="col-sm-4 col-form-label">Kode Lagu</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="kode_lagu" name="kode_lagu" placeholder="Masukan Kode Lagu">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="judul" class="col-sm-4 col-form-label">Judul Lagu</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="judul" name="judul" value="{{ $bk->judul}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="penyanyi" class="col-sm-4 col-form-label">Nama Penyanyi</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="penyanyi" name="penyanyi" value="{{ $bk->penyanyi}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="kategori" class="col-sm-4 col-form-label">Kategori</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="kategori" name="kategori" value="{{ $bk->kategori}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="lagutambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT data lagu -->
                        |
                        <a href="lagu/hapus/{{$bk->id_lagu}}" onclick="return confirm('Yakin mau dihapus?')">
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
    Halaman : {{ $lagu->currentPage() }} <br />
    Jumlah Data : {{ $lagu->total() }} <br />
    Data Per Halaman : {{ $lagu->perPage() }} <br />

    {{ $lagu->links() }}
    <!--akhir pagination-->

    <!-- Awal Modal tambah data Lagu -->
    <div class="modal fade" id="modalLaguTambah" tabindex="-1" role="dialog" aria-labelledby="modalLaguTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLaguTambahLabel">Form Input Data Lagu</h5>
                </div>
                <div class="modal-body">
                    <form name="formlagutambah" id="formlagutambah" action="/lagu/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="id_lagu" class="col-sm-4 col-form-label">Kode Lagu</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="kode_lagu" name="kode_lagu" placeholder="Masukan Kode Lagu">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="judul" class="col-sm-4 col-form-label">Judul Lagu</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukan Judul Lagu">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="penyanyi" class="col-sm-4 col-form-label">Nama Penyanyi</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="penyanyi" name="penyanyi" placeholder="Masukan Nama Penyanyi">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="kategori" class="col-sm-4 col-form-label">Kategori</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Masukan Kategori">
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="lagutambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah data lagu -->
    
@endsection