<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\LevelModel;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserModel extends Authenticatable implements JWTSubject
{
    protected $table = 'm_user';
    protected $primaryKey = 'user_id';
    
    // Atribut yang dapat diisi secara massal
    protected $fillable = ['level_id', 'username', 'nama', 'password'];

    public function getJWTIdentifier(){
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return[];
    }

    
    //use HasFactory; // Gunakan HasFactory trait bersama dengan Notifiable

    //protected $table = 'm_user';
    //protected $primaryKey = 'user_id';
    
    // Atribut yang dapat diisi secara massal
    //protected $fillable = ['level_id', 'username', 'nama', 'password'];

    // Hubungan dengan model Level
    public function level(): BelongsTo
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }

    public function stok(): HasMany
    {
        return $this->hasMany(StokModel::class, 'user_id', 'user_id');
    }

    public function transaksi(): HasMany
    {
        return $this->hasMany(TransaksiModel::class, 'user_id', 'user_id');
    }
}
