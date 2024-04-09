@extends('layouts.app')
{{--Customize layout sections--}}
@section('subtitle', 'Kategori')
@section('content_header_title', 'Kategori')
@section('content_header_subtitle', 'Create')
{{--Content body: main page content--}}
@section('content')
   <div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Buat Kategori Baru</h3>
        </div>

        <form method="post" action="../kategori">
            @csrf <!-- Tambahkan CSRF token untuk keamanan -->
            <div class="card-body">
                <div class="form-group">
                    <label for="kodeKategori">Kode Kategori</label>
                    <input type="text" 
                    class="form-control @error('kodekategori') is -invalid @enderror" 
                    id="kodeKategori" 
                    name="kodeKategori" 
                    placeholder="Masukkan Kode Kategori">
                    @error('kodekategori')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="namaKategori">Nama Kategori</label>
                    <input type="text" class="form-control @error ('namakategori') is-invalid @enderror" 
                    id="namaKategori" name="namaKategori" placeholder="Masukkan Nama Kategori">
                    @error('namakategori')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
@endsection
