<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';
    protected $primaryKey = 'id_status';
    protected $fillable = ['nama_status'];
    public $timestamps = true;

    public function produk()
    {
        return $this->hasMany(Produk::class, 'status_id');
    }
}