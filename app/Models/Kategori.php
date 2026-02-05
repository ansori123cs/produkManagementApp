<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';
    protected $fillable = ['nama_kategori'];
    public $timestamps = true;

    public function produk()
    {
        return $this->hasMany(Produk::class, 'kategori_id');
    }
}