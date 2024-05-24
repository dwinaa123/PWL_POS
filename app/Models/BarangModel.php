<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;

class BarangModel extends Model
{
    use HasFactory;

    protected $table = 'm_barang';
    protected $primaryKey = 'barang_id';
    
    protected $fillable = ['barang_id', 'kategori_id', 'barang_nama', 'barang_kode', 'harga_beli', 'harga_jual', 'created_at', 'updated_at', 'image'];
    
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(KategoriModel::class, 'kategori_id', 'kategori_id');
    }

    //public function getImageAttribute($image)
    //{
        //return url('/storage/posts/' . $image);
    //}
}
