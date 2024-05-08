@extends('layout.app')

{{-- Customize layout sections --}}

@section ('subtitle', 'Manager')
@section ('content_header_title', 'Home')
@section ('ontent_header_subtitle', 'Manager')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Tampilan <?php echo (Auth::user()->level_id == 1)?'Admin':'Manager'; ?>
            <div class="card-body">
                <h1> Login Sebagai:
                    <?php echo (Auth::user()->level_id == 1)? 'Admin' : 'Manager'; ?>
                    <a href="{{ route('logout') }}">Logout</a>
                </div>
        </div>
    </div>
    @endsection

    @push('js')
    @endpush
