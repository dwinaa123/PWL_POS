@extends('layouts.app')

{{-- Customize layout sections --}}
@section('subtitle', 'User')
@section('content_header_title', 'User')
@section('content_header_subtitle', 'Create')

{{-- Content body: main page content --}}
@section('content')
<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah User Baru</h3>
        </div>

        <form method="post" action="{{ route('user.store') }}">
            @csrf <!-- Tambahkan CSRF token untuk keamanan -->
            <div class="card-body">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control @error ('username') is-invalid @enderror" 
                    id="username" name="username" placeholder="Masukkan Username">
                    @error('username') <div class="alert alert-danger">{{
                        $message}}</div>
                        @enderror
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control @error ('nama') is-invalid @enderror" 
                    id="nama" name="nama" placeholder="Masukkan Nama">
                    @error('nama') <div class="alert alert-danger">{{
                        $message}}</div>
                        @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control  @error ('password') is-invalid @enderror" 
                    id="password" name="password" placeholder="Masukkan Password">
                    @error('password') <div class="alert alert-danger">{{
                        $message}}</div>
                        @enderror
                </div>
                <div class="form-group">
                    <label for="level_id">ID Level</label>
                    <input type="number" class="form-control @error ('level_id') is-invalid @enderror" 
                    id="level_id" name="level_id" placeholder="Masukkan Id Level">
                    @error('level_id') <div class="alert alert-danger">{{
                        $message}}</div>
                        @enderror
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
