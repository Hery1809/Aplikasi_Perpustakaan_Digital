<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'kategori_id',
        'status',
        'gambar',
        'pdf',
        'uraian',
    ];

    // Relasi dengan Category
    public function kategori()
    {
        return $this->belongsTo(Category::class, 'kategori_id');
    }

    public function scopeSearchByName($query, $search)
{
    $query->where('nama','LIKE', "%$search");
}
}
