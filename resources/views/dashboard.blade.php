@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row">
        <!-- Card for Level Pengguna -->
        <div class="col-md-3">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-user-tag"></i> Level Pengguna
                    </h3>
                </div>
                <div class="card-body">
                    <ul>
                        @foreach ($levels as $level)
                            <li>{{ $level->nama }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Card for Data Pengguna -->
        <div class="col-md-3">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-users"></i> Data Pengguna
                    </h3>
                </div>
                <div class="card-body">
                    <ul>
                        @foreach ($users as $user)
                            <li>{{ $user->username }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Card for Kategori Barang -->
        <div class="col-md-3">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-tags"></i> Kategori Barang
                    </h3>
                </div>
                <div class="card-body">
                    <ul>
                        @foreach ($kategori as $item)
                            <li>{{ $item->nama }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Card for Data Barang -->
        <div class="col-md-3">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-boxes"></i> Data Barang
                    </h3>
                </div>
                <div class="card-body">
                    <ul>
                        @foreach ($barang as $item)
                            <li>{{ $item->nama }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row mt-3">
        <!-- Card for Stok Barang -->
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-warehouse"></i> Stok Barang
                    </h3>
                </div>
                <div class="card-body">
                    <ul>
                        @foreach ($stok as $item)
                            <li>{{ $item->barang_nama }}: {{ $item->stok_jumlah }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Card for Transaksi Penjualan -->
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-shopping-cart"></i> Transaksi Penjualan
                    </h3>
                </div>
                <div class="card-body">
                    <ul>
                        @foreach ($transaksi as $transaction)
                            <li>{{ $transaction->penjualan_kode }}: {{ $transaction->penjualan_tanggal }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
