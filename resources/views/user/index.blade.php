@extends('layouts.template')

@section('content')
<div class="container">
    <div class="card card-outline card-primary">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">{{ $page->title }}</h3>
            <a class="btn btn-sm btn-primary ml-auto" href="{{ url('user/create') }}">Tambah</a>
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
                            <select name="level_id" id="level_id" class="form-control" required>
                                <option value="">- Semua -</option>
                                @foreach ($level as $item)
                                    <option value="{{ $item->level_id }}">{{ $item->level_nama }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Level Pengguna</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-sm" id="table_level">
                    <thead>
                        <tr>
                            <th style="width: 10%;">ID</th>
                            <th style="width: 10%;">Kode Level</th>
                            <th style="width: 20%;">Nama Level</th>
                            <th style="width: 30%;">Aksi</th>
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
        var dataLevel = $('#table_level').DataTable({
            serverSide: true,
            ajax: {
                url: "{{ url('level/list') }}",
                type: "POST",
                data: function (d) {
                    d.level_id = $('#level_id').val();
                }
            },
            columns: [
                { data: "DT_RowIndex", className: "text-center", orderable: false, searchable: false },
                { data: "level_kode", className: "", orderable: true, searchable: true },
                { data: "level_nama", className: "", orderable: true, searchable: true },
                { data: "aksi", className: "", orderable: false, searchable: false }
            ]
        });

        $('#level_id').on('change', function() {
            dataLevel.ajax.reload();
        });
    });
</script>
@endpush
