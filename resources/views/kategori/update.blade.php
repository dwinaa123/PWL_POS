@extends('layout.app')

@section('subtitle', 'Kategori')
@section('content_header_title', 'Kategori')
@section('content_header_subtitle', 'Update')

@section('content')
<div class="container">
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Update Data Kategori</h3>
        </div>

        <div class="card-body">
            <form method="post" action="{{ route('kategori.update_simpan', ['id' => $data->kategori_id]) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="kodeKategori">Kode Kategori</label>
                    <input type="text" class="form-control" id="kodeKategori" name="kodeKategori" value="{{ old('kodeKategori', $data->kategori_kode) }}" required>
                    @error('kodeKategori')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="namaKategori">Nama Kategori</label>
                    <input type="text" class="form-control" id="namaKategori" name="namaKategori" value="{{ old('namaKategori', $data->nama) }}" required>
                    @error('namaKategori')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-warning">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
