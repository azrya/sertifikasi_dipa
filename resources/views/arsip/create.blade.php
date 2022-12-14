@extends('layouts.layout')
@section('isi')

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">

            <!-- Notifikasi menggunakan flash session data -->
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if (session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
            @endif

            
                    <h3>Arsip Surat >> Unggah</h3>
                    <p>Unggah surat yang telah terbit pada form ini untuk diarsipkan
                        </br>
                        Catatan :
                    <ul>
                        <li>Gunakan file berformat PDF</li>
                    </ul>
                    </p>
                    </br>
                    </br>
                    <form action="{{ route('arsip.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="nomor_Surat" class="col-sm-2 col-form-label">No Surat</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control @error('nomor_Surat') is-invalid @enderror" name="nomor_Surat" value="{{ old('nomor_Surat') }}" required>

                                <!-- error message untuk title -->
                                @error('nomor_Surat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-4">
                                <select name="kategori" class="form-control" required>
                                    <option selected>Undangan</option>
                                    <option>Pengumuman</option>
                                    <option>Nota Dinas</option>
                                    <option>Pemberitahuan</option>
                                </select>
                                @error('kategori')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{ old('judul') }}" required>

                                <!-- error message untuk content -->
                                @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="upload" class="col-sm-2 col-form-label">File Surat(PDF)</label>
                            <div class="col-sm-4">

                                <input class="form-control-file" type="file" id="file" name="file">

                            </div>
                            @error('file')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        </br>
                        </br>
                        <a href="{{ route('arsip.index') }}" class="btn btn-md btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-md btn-primary">Simpan</button>


                    </form>
                </div>
            </div>
        </div>


@endsection