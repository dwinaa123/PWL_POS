<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransaksiModel;

class TransaksiController extends Controller
{
    public function index()
    {
        return TransaksiModel::all();
    }

    public function store(Request $request)
    {
        $transaksi = TransaksiModel::create($request->all() );
        return response()->json($transaksi, 201);
    }

    public function show($id)
    {
        $transaksi = TransaksiModel::find($id);
        if(!$transaksi)
        {
            return response()->json([
                'success' => true,
                'transaksi' => $transaksi,
            ], 200);
        }
        return response()->json([
            'success' => true,
            'transaksi' => $transaksi,
        ], 404);
    }

    public function update(Request $request, TransaksiModel $transaksi)
    {
        $transaksi->update($request->all());
        return TransaksiModel::find($transaksi);
    }

    public function destroy(TransaksiModel $transaksi)
    {
        $transaksi->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Terhapus',
        ]);
    }
}
