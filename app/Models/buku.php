<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\genre;

class buku extends Model
{
    use HasFactory;

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $primaryKey = 'id_buku';

    protected $guarded = [
        'id_buku'
    ];

    protected $fillable = [
        'judul_buku',
        'deskripsi',
        'id_genre',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'stock',
        'cover',
        'file_data',
    ];

    public function genre(){
        return $this->belongsTo(genre::class);
    }
}
