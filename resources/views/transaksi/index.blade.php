@extends('layouts.template')

@section('content')
<div class="container">
    <div class="card card-outline card-primary">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">{{ $page->title }}</h3>
            <a class="btn btn-sm btn-primary ml-auto" href="{{ url('transaksi/create') }}">
                <i class="fas fa-plus"></i> Tambah Transaksi
            </a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="form-group row align-items-center">
                        <label class="col-1 control-label col-form-label">Filter:</label>
                        <div class="col-3">
                            <select name="user_id" id="user_id" class="form-control">
                                <option value="">- Semua -</option>
                                @foreach ($user as $item)
                                    <option value="{{ $item->user_id }}">{{ $item->username }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Pengelola</small>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-sm" id="table_transaksi">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>PIC</th>
                            <th>Pembeli</th>
                            <th>Kode Penjualan</th>
                            <th>Tanggal Penjualan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data diisi secara dinamis oleh DataTable -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $(document).ready(function() {
        var dataTransaksi = $('#table_transaksi').DataTable({
            serverSide: true,
            ajax: {
                url: "{{ url('transaksi/list') }}",
                type: "POST",
                data: function (d) {
                    d.user_id = $('#user_id').val();
                }
            },
            columns: [
                { data: "DT_RowIndex", className: "text-center", orderable: false, searchable: false },
                { data: "user.username", className: "text-center", orderable: true, searchable: true },
                { data: "pembeli", className: "text-center", orderable: true, searchable: true },
                { data: "penjualan_kode", className: "text-center", orderable: true, searchable: true },
                { data: "penjualan_tanggal", className: "text-center", orderable: true, searchable: true },
                { data: "aksi", className: "text-center", orderable: false, searchable: false }
            ]
        });

        // Perbarui data tabel saat filter berubah
        $('#user_id').on('change', function() {
            dataTransaksi.ajax.reload();
        });
    });
</script>
@endpush
