@extends('layouts.template')

@section('content')
<div class="container">
    <div class="card card-outline card-primary">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">{{ $page->title }}</h3>
            <a class="btn btn-sm btn-primary ml-auto" href="{{ url('barang/create') }}">
                <i class="fas fa-plus"></i> Tambah Barang
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
                            <select name="kategori_id" id="kategori_id" class="form-control">
                                <option value="">- Semua -</option>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->kategori_id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Kategori Barang</small>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-sm" id="table_barang">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
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
    var dataBarang = $('#table_barang').DataTable({
        serverSide: true,
        ajax: {
            url: "{{ url('barang/list') }}",
            type: "POST",
            data: function (d) {
                d.kategori_id = $('#kategori_id').val();
            }
        },
        columns: [
            { data: "DT_RowIndex", className: "text-center", orderable: false, searchable: false },
            { data: "barang_kode", className: "text-center", orderable: true, searchable: true },
            { data: "barang_nama", className: "text-center", orderable: true, searchable: true },
            { data: "kategori.nama", className: "text-center", orderable: true, searchable: true },
            { data: "harga_beli", className: "text-center", orderable: true, searchable: true },
            { data: "harga_jual", className: "text-center", orderable: true, searchable: true },
            { data: "aksi", className: "text-center", orderable: false, searchable: false }
        ]
    });

    // Reload data table when filter changes
    $('#kategori_id').on('change', function() {
        dataBarang.ajax.reload();
    });
});

</script>
@endpush
