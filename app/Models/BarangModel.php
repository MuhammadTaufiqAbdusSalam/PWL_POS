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
    protected $fillable = ['barang_kode', 'barang_nama', 'harga_beli', 'harga_jual', 'kategori_id', 'avatar'];
    public function kategori(): BelongsTo{
        return $this->belongsTo(kategoriModel::class, 'kategori_id', 'kategori_id');
    }
    // Accessor untuk avatar
    protected function avatar(): Attribute
    {
        return Attribute::make(
            get: fn ($avatar) => $avatar ? asset('storage/' . $avatar) : asset('barang_default.png')
        );
    }
}
