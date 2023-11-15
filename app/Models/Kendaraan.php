<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $table = 'kendaraan';

    protected $fillable = [
        'no_transaksi', 'no_polisi','pemilik_id', 'tgl_transaksi', 'category_id', 'tarif'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'pemilik_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}