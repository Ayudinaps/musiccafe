@extends('index')
@section('title', 'Pemutaran')

@section('isihalaman')
    <h3><center>Data Pemutaran Buku</center><h3>
    <h3><center>Music & Chill Cafe</center></h3>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPutarTambah"> 
        Tambah Data Pemutaran 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Putar</td>
                <td align="center">Nama Dj</td>
                <td align="center">Nama Pendengar</td>
                <td align="center">Judul Lagu</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($putar as $index=>$p)
                <tr>
                    <td align="center" scope="row">{{ $index + $putar->firstItem() }}</td>
                    <td align="center">{{$p->id_putar}}</td>
                    <td>{{$p->dj->nama_dj}}</td>
                    <td>{{$p->pendengar->nama_pendengar}}</td>
                    <td>{{$p->lagu->judul}}</td>
                    <td align="center">
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalPutarEdit{{$p->id_putar}}"> 
                            Edit
                        </button>

                        <!-- Awal Modal EDIT data Pemutaran -->
                        <div class="modal fade" id="modalPutarEdit{{$p->id_putar}}" tabindex="-1" role="dialog" aria-labelledby="modalPutarEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalPutarEditLabel">Form Edit Data Pemutaran</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formputaredit" id="formputaredit" action="/putar/edit/{{ $p->id_putar}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="form-group row">
                                                <label for="id_putar" class="col-sm-4 col-form-label">ID Putar</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="id_putar" name="id_putar" value="{{ $p->id_putar}}" readonly>
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="dj" class="col-sm-4 col-form-label">Nama Dj</label>
                                                <div class="col-sm-8">
                                                    <select type="text" class="form-control" id="id_dj" name="id_dj">
                                                        @foreach ($dj as $pt)
                                                            @if ($pt->id_dj == $p->id_dj)
                                                                <option value="{{ $pt->id_dj }}" selected>{{ $pt->nama_dj }}</option>
                                                            @else
                                                                <option value="{{ $pt->id_dj }}">{{ $pt->nama_dj }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="pendengar" class="col-sm-4 col-form-label">Nama Pendengar</label>
                                                <div class="col-sm-8">
                                                    <select type="text" class="form-control" id="id_pendengar" name="id_pendengar">
                                                        @foreach ($pendengar as $a)
                                                            @if ($a->id_pendengar == $p->id_pendengar)
                                                                <option value="{{ $a->id_pendengar }}" selected>{{ $a->nama_pendengar }}</option>
                                                            @else
                                                                <option value="{{ $a->id_pendengar }}">{{ $a->nama_pendengar }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="judul" class="col-sm-4 col-form-label">Judul Lagu</label>
                                                <div class="col-sm-8">
                                                    <select type="text" class="form-control" id="id_lagu" name="id_lagu">
                                                        @foreach ($lagu as $bk)
                                                            @if ($bk->id_lagu == $p->id_lagu)
                                                                <option value="{{ $bk->id_lagu }}" selected>{{ $bk->judul }}</option>
                                                            @else
                                                                <option value="{{ $bk->id_lagu }}">{{ $bk->judul }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="putartambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT data Pemutaran -->
                        |
                        <a href="putar/hapus/{{$p->id_putar}}" onclick="return confirm('Yakin mau dihapus?')">
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
    Halaman : {{ $putar->currentPage() }} <br />
    Jumlah Data : {{ $putar->total() }} <br />
    Data Per Halaman : {{ $putar->perPage() }} <br />

    {{ $putar->links() }}
    <!--akhir pagination-->

    <!-- Awal Modal tambah data Pemutaran -->
    <div class="modal fade" id="modalPutarTambah" tabindex="-1" role="dialog" aria-labelledby="modalPutarTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPutarTambahLabel">Form Input Data Pemutaran</h5>
                </div>
                <div class="modal-body">

                    <form name="formputartambah" id="formputartambah" action="/putar/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="id_dj" class="col-sm-4 col-form-label">Nama Dj</label>
                            <div class="col-sm-8">
                                <select type="text" class="form-control" id="id_dj" name="id_dj" placeholder="Pilih Nama Dj">
                                    <option></option>
                                    @foreach($dj as $pt)
                                        <option value="{{ $pt->id_dj }}">{{ $pt->nama_dj }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="id_pendengar" class="col-sm-4 col-form-label">Nama Pendengar</label>
                            <div class="col-sm-8">
                                <select type="text" class="form-control" id="id_pendengar" name="id_pendengar" placeholder="Pilih Nama Pendengar">
                                    <option></option>
                                    @foreach($pendengar as $a)
                                        <option value="{{ $a->id_pendengar }}">{{ $a->nama_pendengar }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="id_lagu" class="col-sm-4 col-form-label">Judul Lagu</label>
                            <div class="col-sm-8">
                                <select type="text" class="form-control" id="id_lagu" name="id_lagu" placeholder="Pilih Judul Lagu">
                                    <option></option>
                                    @foreach($lagu as $bk)
                                        <option value="{{ $bk->id_lagu }}">{{ $bk->judul }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="putartambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah data Pemutaran -->
    
@endsection